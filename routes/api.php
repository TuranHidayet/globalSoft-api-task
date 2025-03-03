<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankomatController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/balance', [BankomatController::class, 'getBalance']);
    Route::post('/deposit', [BankomatController::class, 'deposit']);
    Route::post('/withdraw', [BankomatController::class, 'withdraw']);
    Route::get('/transactions', [BankomatController::class, 'getTransactions']);
    Route::delete('/transaction/{id}', [BankomatController::class, 'deleteTransaction'])->middleware('admin');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
