<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\OpenWhenBoxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaStreamController;

Route::get('/', function () {
    return redirect('/home');
});

// Route::get('home', HomeController::class)->name('home');

// Route::resource('about', AboutController::class)->only(['index']);


Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('checklist.index');
Route::get('/galery', [GaleryController::class, 'index'])->name('galery.index');

Route::post('/schedule/mark', [ScheduleController::class, 'mark'])->name('schedule.mark');
Route::post('/feelings', [MoodController::class, 'store'])->name('feelings.store');

Route::prefix('gift')->group(function () {
    Route::get('/', [GiftController::class, 'index'])->name('gift.index');
    Route::get('/playlist', [PlaylistController::class, 'index'])->name('playlist.index');
    Route::get('/open-when-box', [OpenWhenBoxController::class, 'index'])->name('open-when-box.index');
    Route::get('/open-when-box/{openWhenBox}', [OpenWhenBoxController::class, 'show'])->name('open-when-box.show');
});

// Testing routes
Route::get('/test-responsive', function () {
    return view('test-responsive');
})->name('test.responsive');

Route::get('/test-routes', function () {
    return view('test-routes');
})->name('test.routes');

// Stream media files with Range support (use rawurlencoded storage path)
Route::get('/media/stream/{disk}/{encodedPath}', [MediaStreamController::class, 'stream'])
    ->where('encodedPath', '.*')
    ->name('media.stream');
