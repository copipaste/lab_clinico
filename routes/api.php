<?php

use App\Http\Controllers\Api\AnalysisTypeController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AuthController;
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

Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [AuthController::class, 'index']);
    Route::get('/appointments', [AppointmentController::class, 'index']);
    Route::get('/analysis_types', [AnalysisTypeController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
