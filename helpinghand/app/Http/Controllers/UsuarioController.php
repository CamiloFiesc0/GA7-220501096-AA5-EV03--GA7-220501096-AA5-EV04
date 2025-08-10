<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $usuarios = Usuario::all();
    return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = \App\Models\Usuario::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            // Validar los campos (excepto id porque ya existe)
    $request->validate([
        'nombre' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:20',
        'direccion' => 'nullable|string|max:255',
        'correo' => 'nullable|email|max:255',
        'contrasena' => 'nullable|string|max:255',
        'edad' => 'nullable|integer',
    ]);

    $usuario = \App\Models\Usuario::findOrFail($id);
    $usuario->nombre = $request->nombre;
    $usuario->telefono = $request->telefono;
    $usuario->direccion = $request->direccion;
    $usuario->correo = $request->correo;
    $usuario->contrasena = $request->contrasena;
    $usuario->edad = $request->edad;
    $usuario->save();

    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
    $usuario->delete();

    return redirect()->route('usuarios.index')
                     ->with('success', 'Usuario eliminado correctamente.');
    }
}
