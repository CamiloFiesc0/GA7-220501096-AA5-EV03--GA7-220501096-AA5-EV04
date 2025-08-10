<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicitudes = Solicitud::all();
        return view('solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        return view('solicitudes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|numeric|unique:solicitud,codigo',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'prioridad' => 'required|string|max:50',
            'pago' => 'required|numeric',
            'idusuario' => 'required|numeric|exists:usuario,id'
        ]);

        Solicitud::create($request->all());

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada correctamente.');
    }

    public function edit(Solicitud $solicitude) // Nota: el modelo se llama Solicitud, pero la variable debe coincidir con la ruta
    {
        return view('solicitudes.edit', compact('solicitude'));
    }

    public function update(Request $request, Solicitud $solicitude)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'prioridad' => 'required|string|max:50',
            'pago' => 'required|numeric',
            'idusuario' => 'required|numeric|exists:usuario,id'
        ]);

        $solicitude->update($request->all());

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada correctamente.');
    }

    public function destroy(Solicitud $solicitude)
    {
        $solicitude->delete();
        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada correctamente.');
    }
}
