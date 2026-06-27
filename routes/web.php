<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/contact', [LandingController::class, 'store'])->name('landing.contact');
Route::view('/', 'practice')->name('practice');
