<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function (){
    Route::post('auth/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);
        Route::apiResource('category', CategoryController::class);
        Route::apiResource('customer', CustomerController::class);
        Route::apiResource('transaction', TransactionController::class)
            ->except(['update']);

        Route::apiResource('transaction.detail', TransactionDetailController::class); 
        
        Route::get('categories_analytics', [DashboardController::class, 'categories_analytics']);
        Route::get('transactions_analytics', [DashboardController::class, 'transactions_analytics']);
    });
});