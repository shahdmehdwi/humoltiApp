<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\driverController;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('admin', adminController::class);
Route::apiResource('driver', driverController::class);
