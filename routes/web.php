<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\DishesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Customization Auth Routes
Auth::routes([
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
  'confirm' => false, // Login confirm Routes...
]);

//Main Blade Routes
Route::resource('/dish', App\Http\Controllers\DishController::class);
Route::resource('/order', App\Http\Controllers\OrderController::class);


