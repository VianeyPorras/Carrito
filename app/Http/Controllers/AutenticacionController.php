<?php

// Define el namespace del controlador
namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;

// Importa Hash para encriptar y verificar contraseñas
use Illuminate\Support\Facades\Hash;


class AutenticacionController extends Controller
{
    // Muestra la vista del formulario de registro
    public function mostrarRegistro()
    {
        return view('registro');
    }

    // Método que procesa el registro de un nuevo cliente
    public function registrar(Request $request)
    {
        // Validación de los datos enviados desde el formulario
        $request->validate([
            'nombre' => 'required|string|max:20', // obligatorio, texto, máximo 20 caracteres
            'apellido_paterno' => 'required|string|max:25', // obligatorio, texto, máximo 25 caracteres
            'apellido_materno' => 'required|string|max:25', // obligatorio, texto, máximo 25 caracteres
            'correo_electronico' => 'required|email|max:30|unique:clientes,correo_electronico', 
            // obligatorio, formato email, máximo 30 caracteres, debe ser único en la tabla clientes
            'password' => 'required|string|min:10', // obligatorio, texto, mínimo 10 caracteres
            'telefono' => 'nullable|string|max:10' // opcional, texto, máximo 10 caracteres
        ]);

        // Se crea una nuevO objeto del modelo Cliente
        $cliente = new Cliente();

        // Se asignan los valores recibidos del formulario al modelo
        $cliente->nombre = $request->nombre;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->correo_electronico = $request->correo_electronico;

        // La contraseña se encripta antes de guardarse por seguridad
        $cliente->password = Hash::make($request->password);

        // Se asigna el teléfono (puede ser null si no se envía)
        $cliente->telefono = $request->telefono;

        //se asigna la fecha actual de registro, es automatica.
        $cliente->fecha_registro = date('Y-m-d');

        // Se guarda el registro en la base de datos
        $cliente->save();

        // Redirige al registro nuevamente con un mensaje de éxito en la sesión
        return redirect('/registro')
            ->with('success', 'Cliente registrado correctamente');
    }

    // Muestra la vista del formulario de login
    public function mostrarLogin()
    {
        return view('login');
    }

    // Método que procesa el inicio de sesión
    public function login(Request $request)
    {
        // Validación de datos del login
        $request->validate([
            'correo_electronico' => 'required|email',
            'password' => 'required' // ambos son obligatorio
        ]);

        // Busca al cliente en la base de datos por correo electrónico
        $cliente = Cliente::where('correo_electronico', $request->correo_electronico)->first();

        // Si no existe el usuario, regresa con error
        if (!$cliente) {
            return back()->with('error', 'Usuario no encontrado');
        }

        // Verifica si la contraseña ingresada coincide con la almacenada
        if (!Hash::check($request->password, $cliente->password)) {
            return back()->with('error', 'Contraseña incorrecta');
        }

        // Si todo es correcto, se crea la sesión del usuario
        session([
            'cliente_id' => $cliente->id_cliente, // ID del cliente en sesión
            'cliente_nombre' => $cliente->nombre // Nombre del cliente en sesión
        ]);

        // Redirige al usuario a la página principal
        return redirect('/inicio');
    }
}
