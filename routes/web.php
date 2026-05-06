<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\DishesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('order.form');
Route::post('/order_submit', [App\Http\Controllers\OrderController::class, 'submit'])->name('order.submit');

//Customization Auth Routes
Auth::routes([
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
  'confirm' => false, // Login confirm Routes...
]);

//Routes for waiter panel
Route::resource('/order', App\Http\Controllers\OrderController::class);
Route::get('/order/{order}/serve', [App\Http\Controllers\OrderController::class, 'serve']);

// Routes for kitchen panel
Route::resource('/dish', App\Http\Controllers\DishController::class);
Route::get('/kitchen_order', [App\Http\Controllers\DishController::class, 'order'])->name('kitchen.order');
Route::get('/kitchen_order/{order}/approve', [App\Http\Controllers\DishController::class, 'approve']);
Route::get('/kitchen_order/{order}/cancel', [App\Http\Controllers\DishController::class, 'cancel']);
Route::get('/kitchen_order/{order}/ready', [App\Http\Controllers\DishController::class, 'ready']);




