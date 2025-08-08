<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Compra;
use App\Models\Compra_Articulo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function compraslistar()
    {
        $compras = Compra::with(
            'compras_articulos.articulo.catalogos.tipo.especificaciones',
            'compras_articulos.articulo.catalogos.especificacion'
        )
            ->orderBy('created_at', 'desc')
            ->get();

        $categorias = Categoria::with([
            'categoriasHijosRecursivamente.productos.articulos', // Carga recursiva con productos y artículos
            'productos.articulos' // También carga productos de las categorías de primer nivel
        ])
            ->where('categoria_id', null)
            ->get();

        return view('layouts.admin.compras.listar', compact('compras', 'categorias'));
    }

    public function verdetalles($id)
    {
        $compra = Compra::with('comprasArticulos.articulo')->findOrFail($id);

        return response()->json($compra);
    }

    public function comprasRegistrar(Request $request)
    {
        //\Log::info($request->all());
        //exit;

        $compra_id = Compra::InsertGetId([
            'codigo' => $request->codigo,
            'fecha_compra' => $request->fecha_compra,
            'precio_total' => $request->precio,
            'descuento' => $request->descuento,
            'pago_total' => $request->precio - $request->descuento,
            'cantidad' => $request->cantidad
        ]);

        $articulos = $request->articulos;

        foreach ($articulos as $a) {
            Compra_Articulo::create([
                'compra_id' => $compra_id,
                'articulo_id' => $a['articulo_id'],
                'cantidad_comprada' => $a['cantidad'],
                'detalle_precio' => 0,
                'descuento' => 0,
            ]);

            $articulo = Articulo::where('id', $a['articulo_id'])->first();

            Articulo::where('id', $a['articulo_id'])->update([
                'stock' => $articulo->stock + $a['cantidad']
            ]);
        }
        return response()->json([
            'success' => true,
            'msg' => 'Compra Registrada correctamente.!'
        ]);
    }

    public function registrarCompraArticulo(Request $request)
    {
        $request->validate([
            'articulo_id' => 'required|exists:articulos,id',
            'cantidad_comprada' => 'required|integer|min:1',
            'detalle_precio' => 'required|numeric|min:0',
            'descuento' => 'nullable|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $descuento = $request->input('descuento', 0);
            $pago_total = $request->detalle_precio - $descuento;

            $ultimoCodigo = Compra::orderBy('id', 'desc')->first();
            $nuevoCodigo = 'COMP-' . str_pad(($ultimoCodigo?->id + 1 ?? 1), 6, '0', STR_PAD_LEFT);

            $compra = Compra::create([
                'codigo' => $nuevoCodigo,
                'fecha_compra' => Carbon::now(),
                'precio_total' => $request->detalle_precio,
                'descuento' => $descuento,
                'pago_total' => $pago_total,
                'cantidad' => $request->cantidad_comprada,
            ]);

            Compra_Articulo::create([
                'compra_id' => $compra->id,
                'articulo_id' => $request->articulo_id,
                'cantidad_comprada' => $request->cantidad_comprada,
                'detalle_precio' => $request->detalle_precio,
                'descuento' => $descuento,
            ]);


            $articulo = \App\Models\Articulo::findOrFail($request->articulo_id);
            $articulo->stock += $request->cantidad_comprada;
            $articulo->save();

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Compra registrada correctamente.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Error al registrar la compra.', 'error' => $e->getMessage()]);
        }
    }
}
