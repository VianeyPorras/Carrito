<?php

use Illuminate\Support\Facades\Route;

// Importa el controlador de autenticación
use App\Http\Controllers\AutenticacionController;
Route::get('/', function () {
    return view('welcome');
});

// === RUTAS DE REGISTRO == //


// Muestra el formulario de registro
Route::get('/registro', [AutenticacionController::class, 'mostrarRegistro']);

// Procesa el registro de un usuario (envío de formulario POST)
Route::post('/registro', [AutenticacionController::class, 'registrar']);


//== RUTAS DE LOGIN == //


// Procesa el login del usuario
Route::post('/login', [AutenticacionController::class, 'login']);

// Muestra el formulario de login
Route::get('/login', [AutenticacionController::class, 'mostrarLogin']);

 //== RUTA PROTEGIDA (INICIO) == //


Route::get('/inicio', function () {

    // Verifica si existe sesión del cliente (usuario autenticado)
    if (!session('cliente_id')) {

        // Si no hay sesión, redirige al login con mensaje de error
        return redirect('/login')
            ->with('error', 'Debes iniciar sesion');
    }

    // Si hay sesión, muestra la vista de inicio
    return view('inicio');
});

//== CERRAR SESIÓN ==//


Route::get('/logout', function () {

    // Elimina toda la información de la sesión
    session()->flush();

    // Redirige al login después de cerrar sesión
    return redirect('/login');
});