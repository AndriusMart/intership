<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Days;
use App\Http\Controllers\Words;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/calcDays', [Days::class, 'calcDays'])->name('calcDays');
Route::get('/numToWord', [Words::class, 'numToWord'])->name('numToWord');
Auth::routes();

