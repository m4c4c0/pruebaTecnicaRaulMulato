<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Models\Municipio;

Route::get('/', [ClienteController::class, 'index']);

Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit']);
Route::put('/clientes/{cliente}', [ClienteController::class, 'update']);
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy']);

Route::get('/municipios/{departamento}', function($codDepartamento) {
    $municipios = Municipio::where('cod_mh_departamento', $codDepartamento)->get();
    return response()->json($municipios);
});

Route::get('/clientes/buscar', [ClienteController::class, 'buscar'])->name('clientes.buscar');
