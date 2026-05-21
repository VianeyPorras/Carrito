<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

Route::get('/clientes', [ClientesController::class, 'index']);
Route::post('/clientes', [ClientesController::class, 'store']);
Route::put('/clientes/{id_cliente}', [ClientesController::class, 'update']);
Route::delete('/clientes/{id_cliente}', [ClientesController::class, 'destroy']);