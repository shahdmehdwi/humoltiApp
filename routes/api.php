<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\advertisementController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\driverController;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\paymentController;
use App\Http\Controllers\Admin\vechileController;
use App\Http\Controllers\Customer\orderController as CustomerOrderController;
use App\Http\Controllers\Driver\orderController as DriverOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('admin', adminController::class);
Route::apiResource('driver', driverController::class);
Route::apiResource('payment', paymentController::class);
Route::apiResource('category', categoryController::class);
Route::apiResource('ads', advertisementController::class);
Route::apiResource('order', orderController::class);
Route::apiResource('order', CustomerOrderController::class);
Route::apiResource('order', DriverOrderController::class);
Route::apiResource('vechile', vechileController::class);







