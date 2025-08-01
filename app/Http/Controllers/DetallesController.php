<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalle;

class DetallesController extends Controller
{
    public function editardetalles(Request $request)
    {
        foreach ($request->detalles as $detalleData) {
            $detalle = Detalle::find($detalleData['id']);
            if ($detalle) {
                $detalle->titulo = $detalleData['titulo'];
                $detalle->descripcion = $detalleData['descripcion'];
                $detalle->save();
            }
        }

        return response()->json(['success' => true, 'message' => 'Detalles actualizados correctamente.']);
    }

    public function registrardetalles(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ]);

        Detalle::create([
            'producto_id' => $request->producto_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json(['success' => true, 'message' => 'Detalle agregado correctamente.']);
    }

    /** UN DETALLE */

    public function editarDetalle(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:detalles,id',
                'titulo' => 'required|string|max:255',
                'descripcion' => 'required|string',
            ]);

            $detalle = Detalle::find($request->id);

            $detalle->titulo = $request->titulo;
            $detalle->descripcion = $request->descripcion;
            $detalle->save();

            return response()->json([
                'success' => true,
                'message' => 'Detalle actualizado correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => 'Error: ' . $e->getMessage()
            ]);
        }
    }

    public function eliminarDetalle(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:detalles,id',
            ]);

            $detalle = Detalle::find($request->id);
            $detalle->delete();

            return response()->json([
                'success' => true,
                'message' => 'Detalle eliminado correctamente.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }
}
