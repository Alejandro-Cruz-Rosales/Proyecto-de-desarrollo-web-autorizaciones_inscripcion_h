<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AutorizacionesInscripcionHApiController;
use App\Models\AutorizacionesInscripcionH;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas de API para Aseguradoras
Route::apiResource('autorizacion_inscripcion_h', AutorizacionesInscripcionHApiController::class);
