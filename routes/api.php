<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\EmployeeController;
use App\Http\Controllers\Master\BuyerController;

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/

Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::post('/', [EmployeeController::class, 'store']);
    Route::put('/{id}', [EmployeeController::class, 'update']);
    Route::delete('/{id}', [EmployeeController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| Buyer Routes
|--------------------------------------------------------------------------
*/

Route::prefix('buyers')->group(function () {
    Route::get('/', [BuyerController::class, 'index']);
    Route::post('/', [BuyerController::class, 'store']);
    Route::put('/{id}', [BuyerController::class, 'update']);
    Route::delete('/{id}', [BuyerController::class, 'destroy']);
});
