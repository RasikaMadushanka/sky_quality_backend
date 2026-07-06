<?php

use App\Http\Controllers\Master\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::post('/employees', [EmployeeController::class, 'store']);
Route::get('/employees', [EmployeeController::class, 'index']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);
