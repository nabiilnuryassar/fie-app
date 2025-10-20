<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeling;

class MoodController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'feelingNotes' => ['required', 'string', 'max:500'],
        ]);

        $feeling = Feeling::create([
            'description' => $data['feelingNotes'],
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Sent successfully',
                'data' => $feeling,
            ], 201);
        }

        return redirect()->back()->with('status', 'Sent successfully');
    }
}
