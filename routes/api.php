<?php

use App\Http\Controllers\Admin\adminAdvertisementController;
use App\Http\Controllers\Admin\adminAuthController;
use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\adminCustomerController;
use App\Http\Controllers\Admin\adminDriverController;
use App\Http\Controllers\Admin\adminOrderController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\customerController;
use App\Http\Controllers\Admin\paymentController;
use App\Http\Controllers\Admin\vehicleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\customerAdvertisementController as CustomerCustomerAdvertisementController;
use App\Http\Controllers\Customer\customerAuthController;
use App\Http\Controllers\Customer\customerController as CustomerCustomerController;
use App\Http\Controllers\Customer\customerOrderController as CustomerCustomerOrderController;
use App\Http\Controllers\Driver\driverAdvertisementController as DriverDriverAdvertisementController;
use App\Http\Controllers\Driver\driverAuthController;
use App\Http\Controllers\Driver\driverController as DriverDriverController;
use App\Http\Controllers\Driver\driverOrderController as DriverDriverOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');







/* admin routes */
Route::post('rega', [adminController::class,'registeration']);
Route::post('logina', [adminAuthController::class,'login']);


/* driver routes */
Route::post('logind', [driverAuthController::class,'login']);


/* customer routes */
Route::post('regc', [CustomerCustomerController::class,'registeration']);
Route::post('loginc', [CustomerAuthController::class,'login']);




Route::group([

    'middleware' => 'auth:admin',
    'prefix' => 'auth'

], 

function ($router) {


    Route::get('logouta', [adminAuthController::class,'logout']);
    Route::get('profilea', [adminAuthController::class,'me']);


    /* admin routes */

    Route::apiResource('admin', adminController::class);
    Route::post('resetPassworda', [adminController::class,'resetPassword']);
    Route::post('forgetPassworda', [adminController::class,'forgetPassword']);
    Route::post('regd', [adminDriverController::class,'registeration']);
    Route::apiResource('customera', adminCustomerController::class)->except(['store','update']);
    Route::apiResource('drivera', adminDriverController::class)->except(['store']);
    Route::apiResource('vehicle', vehicleController::class);
    Route::apiResource('payment', paymentController::class);
    Route::apiResource('category', categoryController::class);
    Route::apiResource('adsa', adminAdvertisementController::class)->only(['show']);
    Route::apiResource('ordera', adminOrderController::class)->except(['store']);
    

});



    
Route::group([

    'middleware' => 'auth:customer',
    'prefix' => 'auth'

], 

function ($router) {


    Route::get('logoutc', [customerAuthController::class,'logout']);
    Route::get('profilec', [customerAuthController::class,'me']);

    /* customer routes */

    Route::post('regc', [CustomerCustomerController::class,'registeration']);
    Route::post('resetPasswordc', [CustomerCustomerController::class,'resetPassword']);
    Route::post('forgetPasswordc', [CustomerCustomerController::class,'forgetPassword']);
    Route::apiResource('customerc', CustomerCustomerController::class)->except(['store']);
    Route::apiResource('orderc', CustomerCustomerOrderController::class)->except(['destroy']);
    Route::apiResource('adsc', CustomerCustomerAdvertisementController::class)->only(['show']);
 

});




Route::group([

    'middleware' => 'auth:driver',
    'prefix' => 'auth'

], 

function ($router) {


    Route::get('logoutd', [driverAuthController::class,'logout']);
    Route::get('profiled', [driverAuthController::class,'me']);

     /* driver routes */

    Route::post('resetPasswordd', [DriverDriverController::class,'resetPassword']);
    Route::post('forgetPasswordd', [DriverDriverController::class,'forgetPassword']);
    Route::post('accept', [DriverDriverOrderController::class,'accept']);
    Route::post('reject', [DriverDriverOrderController::class,'reject']);
    Route::apiResource('orderd', DriverDriverOrderController::class)->except(['store','destroy','update']);
    Route::apiResource('driver', DriverDriverController::class)->except(['store','update']);
    Route::apiResource('adsd', DriverDriverAdvertisementController::class)->only(['show']);

    
});










