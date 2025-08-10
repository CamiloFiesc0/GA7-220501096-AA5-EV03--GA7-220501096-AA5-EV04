<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudApiController extends Controller
{
    public function index()
    {
        return response()->json(Solicitud::all(), 200);
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

        $solicitud = Solicitud::create($request->all());

        return response()->json([
            'message' => 'Solicitud creada correctamente',
            'data' => $solicitud
        ], 201);
    }

    public function show($id)
    {
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

        return response()->json($solicitud, 200);
    }

    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

        $request->validate([
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'fecha' => 'required|date',
            'prioridad' => 'required|string|max:50',
            'pago' => 'required|numeric',
            'idusuario' => 'required|numeric|exists:usuario,id'
        ]);

        $solicitud->update($request->all());

        return response()->json([
            'message' => 'Solicitud actualizada correctamente',
            'data' => $solicitud
        ], 200);
    }

    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);

        if (!$solicitud) {
            return response()->json(['message' => 'Solicitud no encontrada'], 404);
        }

        $solicitud->delete();

        return response()->json(['message' => 'Solicitud eliminada correctamente'], 200);
    }
}
