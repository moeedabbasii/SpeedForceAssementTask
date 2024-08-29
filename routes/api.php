<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SpinWheelController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('throttle:5,1')->group(function () {      //applying limit

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'role:Retailer'])->group(function () { // retaileer route
    Route::post('/use-spin', [SpinWheelController::class, 'useSpin']);
    Route::post('/buy-spin', [SpinWheelController::class, 'buySpin']);
    Route::get('/spin-history', [SpinWheelController::class, 'spinHistory']);
});

Route::middleware(['auth:sanctum', 'role:Admin'])->group(function () { // admin route
    Route::get('/admin/spin-history', [SpinWheelController::class, 'adminSpinHistory']);
});
});
