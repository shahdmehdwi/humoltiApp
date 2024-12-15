<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\advertisementController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Customer\customerController;
use App\Http\Controllers\Admin\driverController;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\paymentController;
use App\Http\Controllers\Admin\vehicleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\orderController as CustomerOrderController;
use App\Http\Controllers\Driver\driverController as DriverDriverController;
use App\Http\Controllers\Driver\orderController as DriverOrderController;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::post('loginAdmin', [AdminController::class,'login']);
Route::post('loginAuth', [AuthController::class,'login']);


Route::post('reg', [adminController::class,'registeration']);
Route::post('regCustomer', [customerController::class,'registeration']);
Route::get('resetPassword', [adminController::class,'resetPassword']);
Route::post('changePassword', [adminController::class,'changePassword']);




Route::group([

    'middleware' => 'auth:guard',
    'prefix' => 'auth'

], 

function ($router) {

    Route::apiResource('admin', adminController::class);

    Route::apiResource('userControl', adminController::class);
    Route::get('logout', [AuthController::class,'logout']);
    Route::get('profile', [AuthController::class,'me']);
    Route::apiResource('driver', driverController::class);
    Route::apiResource('payment', paymentController::class);
    Route::apiResource('category', categoryController::class);
    Route::apiResource('ads', advertisementController::class);
    Route::apiResource('adminorder', orderController::class);

    Route::apiResource('customer', CustomerController::class);
    Route::apiResource('customerorder', CustomerOrderController::class);
 
Route::apiResource('driverorder', DriverOrderController::class);
Route::apiResource('driverads', DriverDriverController::class);
Route::apiResource('vehicle', vehicleController::class);

});











