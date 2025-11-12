<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorizacionesInscripcionHController;

// Ruta principal
Route::get('/', function () {
    return view('layouts.app');
})->name('home');

// Rutas del recurso - usando 'institutos' para coincidir con tu vista
Route::resource('autorizaciones_inscripcion_h', AutorizacionesInscripcionHController::class);