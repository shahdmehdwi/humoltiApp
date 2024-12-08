<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\advertisementController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\driverController;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\paymentController;
use App\Http\Controllers\Admin\vehicleController;
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
Route::apiResource('orderCC', orderController::class);
Route::apiResource('ordercx', CustomerOrderController::class);
Route::apiResource('order', DriverOrderController::class);
Route::apiResource('vehicle', vehicleController::class);







