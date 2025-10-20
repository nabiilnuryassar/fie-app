<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::query()
            ->orderBy('created_at', 'desc')
            ->orderBy('start_time')
            ->get();

        // Group by created_at date string and sort groups: today first, then newest to oldest
        $today = now()->toDateString();
        $schedulesByDate = $schedules
            ->groupBy(fn ($item) => $item->created_at->toDateString())
            ->sortByDesc(function ($items, $date) use ($today) {
                // Place today at the very top
                return $date === $today ? now()->addYears(100)->timestamp : strtotime($date);
            });

        // Within each day, sort by start_time ascending
        $schedulesByDate = $schedulesByDate->map(function ($items) {
            return $items->sortBy('start_time')->values();
        });

        return view('pages.schedule', compact('schedules', 'schedulesByDate'));
    }

    public function mark(Request $request)
    {
        $data = $request->validate([
            'schedule_id' => ['required', 'integer', 'exists:schedules,id'],
            'is_done' => ['required', 'boolean'],
        ]);

        $schedule = Schedule::findOrFail($data['schedule_id']);

        if ($data['is_done']) {
            $schedule->is_done = 1;
            $message = $schedule->message_when_done ?: 'Great! Activity completed.';
        } else {
            // If currently done, set to not done; otherwise keep as not done
            $schedule->is_done = 0;
            $message = $schedule->message_when_cancel ?: 'Activity canceled for now.';
        }

        $schedule->save();

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'ok',
                'is_done' => (bool) $schedule->is_done,
                'message' => $message,
                'schedule' => $schedule,
            ]);
        }

        return redirect()->back()->with([
            'status' => $message,
            'status_type' => $data['is_done'] ? 'done' : 'cancel',
        ]);
    }
}
