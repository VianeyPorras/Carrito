<?php

namespace App\Http\Controllers;
// Importa el modelo Cliente de la tabla clientes 
use App\Models\Cliente;
// Permite retornar respuestas en formato JSON
use Illuminate\Http\JsonResponse;
// Permite encriptar contraseñas
use Illuminate\Support\Facades\Hash;
// Regla de validación para campos únicos como correo
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

// Controlador de tipo API para manejar clientes
class ClientesController extends Controller
{

        //=== Mostrar los Clientes ==//
    public function index(): JsonResponse
    {
        // Obtiene todos los registros de la tabla clientes
        $clientes = Cliente::all();

        // Devuelve los datos en formato JSON
        return response()->json($clientes);
    }

    
    // == CREAR NUEVO CLIENTE == //
    
    public function store(Request $request): JsonResponse
    {
        // Valida los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:20',
            'apellido_paterno' => 'required|string|max:25',
            'apellido_materno' => 'required|string|max:25',
            'correo_electronico' => 'required|email|max:30|unique:clientes,correo_electronico',
            'password' => 'required|string|min:10',
            'fecha_registro' => 'required|date',
            'telefono' => 'nullable|string|max:10'
        ]);

        // Crea un nuevo objeto Cliente
        $cliente = new Cliente();

        // Asigna valores del request al modelo
        $cliente->nombre = $request->nombre;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->correo_electronico = $request->correo_electronico;

        // Encripta la contraseña antes de guardarla
        $cliente->password = Hash::make($request->password);

        // Guarda la fecha de registro enviada
        $cliente->fecha_registro = $request->fecha_registro;

        // Guarda teléfono (puede ser null)
        $cliente->telefono = $request->telefono;

        // Guarda el registro en la base de datos
        $cliente->save();

        // Devuelve el cliente creado con código HTTP 201 (creado)
        return response()->json($cliente, 201);
    }

    
    // == MOSTRAR UN SOLO CLIENTE == //
    public function show(string $id_cliente): JsonResponse
    {
        // Busca el cliente por ID o falla si no existe
        $cliente = Cliente::findOrFail($id_cliente);

        // Devuelve el cliente en JSON
        return response()->json($cliente);
    }


    // == ACTUALIZAR CLIENTE == //
    public function update(Request $request, string $id_cliente): JsonResponse
    {
        // Busca el cliente a actualizar
        $cliente = Cliente::findOrFail($id_cliente);

        // Valida solo los campos enviados
        $request->validate([
            'nombre' => 'sometimes|string|max:20',
            'apellido_paterno' => 'sometimes|string|max:25',
            'apellido_materno' => 'sometimes|string|max:25',
            'correo_electronico' => ['sometimes','email','max:30', // Evita duplicados excepto el mismo cliente
            Rule::unique('clientes', 'correo_electronico')->ignore($cliente->id_cliente)
            ],
            'password' => 'sometimes|string|min:10',
            'fecha_registro' => 'sometimes|date',
            'telefono' => 'nullable|string|max:10'
        ]);

        // Actualiza solo los campos que vienen en la petición
        if ($request->has('nombre')) $cliente->nombre = $request->nombre;
        if ($request->has('apellido_paterno')) $cliente->apellido_paterno = $request->apellido_paterno;
        if ($request->has('apellido_materno')) $cliente->apellido_materno = $request->apellido_materno;
        if ($request->has('correo_electronico')) $cliente->correo_electronico = $request->correo_electronico;

        // Si se envía password, se encripta antes de guardar
        if ($request->has('password')) {
            $cliente->password = Hash::make($request->password);
        }

        // Actualiza fecha si viene en la petición
        if ($request->has('fecha_registro')) {
            $cliente->fecha_registro = $request->fecha_registro;
        }

        // Actualiza teléfono si viene en la petición
        if ($request->has('telefono')) $cliente->telefono = $request->telefono;

        // Guarda cambios en base de datos
        $cliente->save();

        // Devuelve cliente actualizado en JSON
        return response()->json($cliente);
    }


    // ==== ELIMINAR CLIENTE ==== //
   
    public function destroy(string $id_cliente): JsonResponse
    {
        // Busca el cliente por ID
        $cliente = Cliente::findOrFail($id_cliente);

        // Elimina el registro de la base de datos
        $cliente->delete();

        // Devuelve mensaje de confirmación
        return response()->json(['mensaje' => 'Cliente eliminado correctamente']);
    }
}
