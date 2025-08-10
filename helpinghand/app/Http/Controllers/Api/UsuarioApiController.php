<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioApiController extends Controller
{
    // Obtener todos los usuarios
    public function index()
    {
        return response()->json(Usuario::all(), 200);
    }

    // Obtener un usuario por ID
    public function show($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        return response()->json($usuario, 200);
    }

    // Crear nuevo usuario
    public function store(Request $request)
    {
          // Valida que el campo id sea único en la tabla usuario
    $request->validate([
        'id' => 'required|unique:usuario,id',
        'nombre' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:20',
        'direccion' => 'nullable|string|max:255',
        'correo' => 'nullable|email|max:255',
        'contrasena' => 'nullable|string|max:255',
        'edad' => 'nullable|integer',
    ]);

    $usuario = new \App\Models\Usuario();
    $usuario->id = $request->id; // El documento ingresado por el usuario
    $usuario->nombre = $request->nombre;
    $usuario->telefono = $request->telefono;
    $usuario->direccion = $request->direccion;
    $usuario->correo = $request->correo;
    $usuario->contrasena = $request->contrasena;
    $usuario->edad = $request->edad;
    $usuario->save();

    return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente'); 
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $request->validate([
            'documento' => 'required|unique:usuario,documento,' . $id,
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'email' => 'required|email|unique:usuario,email,' . $id,
            'clave' => 'nullable|string|min:6',
        ]);

        $usuario->documento = $request->documento;
        $usuario->nombre = $request->nombre;
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        $usuario->email = $request->email;

        if ($request->filled('clave')) {
            $usuario->clave = bcrypt($request->clave);
        }

        $usuario->save();

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'usuario' => $usuario
        ], 200);
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }
}
