<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoodController;

Route::get('/', [MoodController::class, 'index']);
Route::delete('/mood/reset', [MoodController::class, 'reset'])->name('mood.reset');
Route::get('/mood', [MoodController::class, 'index'])->name('mood.index');
Route::post('/mood/store', [MoodController::class, 'store'])->name('mood.store');
