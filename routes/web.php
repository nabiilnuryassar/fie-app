<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\MoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

// Route::get('home', HomeController::class)->name('home');

// Route::resource('about', AboutController::class)->only(['index']);


Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('checklist.index');
Route::get('/galery', [GaleryController::class, 'index'])->name('galery.index');
Route::get('/playlist', [PlaylistController::class, 'index'])->name('playlist.index');
Route::post('/schedule/mark', [ScheduleController::class, 'mark'])->name('schedule.mark');
Route::post('/feelings', [MoodController::class, 'store'])->name('feelings.store');
// Testing routes
Route::get('/test-responsive', function () {
    return view('test-responsive');
})->name('test.responsive');

Route::get('/test-routes', function () {
    return view('test-routes');
})->name('test.routes');
