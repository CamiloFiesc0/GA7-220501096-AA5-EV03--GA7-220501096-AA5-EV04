<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioApiController;

Route::apiResource('usuarios', UsuarioApiController::class);




