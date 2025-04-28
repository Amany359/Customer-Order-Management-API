<?php
// routes/api.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\OrderController;

Route::post('register', [CustomerController::class, 'register']);  // تسجيل مستخدم جديد


Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    
    Route::apiResource('orders', OrderController::class);
});
