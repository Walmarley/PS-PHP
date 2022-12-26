<?php

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MaintenanceScheduledController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::apiResource('/user', UserController::class);
Route::post('/adduser', [UserController::class, 'store']);
Route::middleware('auth:sanctum')->delete('/deleteuser', [UserController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/veiculos', [VehicleController::class, 'index']);
Route::middleware('auth:sanctum')->get('/verveiculo/{id}', [VehicleController::class, 'show']);
Route::middleware('auth:sanctum')->post('/addveiculo', [VehicleController::class, 'store']);
Route::middleware('auth:sanctum')->put('/editarveiculo/{id}', [VehicleController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/excluirveiculo/{id}', [VehicleController::class, 'destroy']);

Route::middleware('auth:sanctum')->post('/agendar/{id}', [MaintenanceController::class, 'store']);
Route::middleware('auth:sanctum')->put('/reagendar/{id}', [MaintenanceController::class, 'update']);
Route::middleware('auth:sanctum')->get('/agendado/{id}', [MaintenanceController::class, 'show']);
Route::middleware('auth:sanctum')->delete('/cancelar/{id}', [MaintenanceController::class, 'destroy']);
Route::middleware('auth:sanctum')->get('/manutencaoagendada/{vehicleId}', [MaintenanceController::class, 'index']);

Route::middleware('auth:sanctum')->get('/agendamentos', [MaintenanceScheduledController::class, 'scheduling']);
Route::middleware('auth:sanctum')->get('/agendamentosdouser', [MaintenanceScheduledController::class, 'schedulingUser']);
