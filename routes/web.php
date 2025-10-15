<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('home', HomeController::class)->name('home');

// Route::resource('about', AboutController::class)->only(['index']);


Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('checklist.index');
