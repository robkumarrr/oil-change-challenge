<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/cars', [CarController::class, 'store'])->name('car.store');
