<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioApiController;
use App\Http\Controllers\Api\SolicitudApiController;

Route::apiResource('solicitud', SolicitudApiController::class);
Route::apiResource('usuarios', UsuarioApiController::class);


Route::delete('/usuarios/{id}', [UsuarioApiController::class, 'destroy']);




