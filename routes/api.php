<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\DoctorScheduleController;
use App\Http\Controllers\Api\PatientScheduleController;
use App\Http\Controllers\Api\ServiceMedicinesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::apiResource('doctor', DoctorController::class)->middleware('auth:sanctum');
Route::apiResource('patient', PatientController::class)->middleware('auth:sanctum');
Route::apiResource('doctor-schedule', DoctorScheduleController::class)->middleware('auth:sanctum');
Route::apiResource('service-medicine', ServiceMedicinesController::class)->middleware('auth:sanctum');
Route::apiResource('patient-schedule', PatientScheduleController::class)->middleware('auth:sanctum');