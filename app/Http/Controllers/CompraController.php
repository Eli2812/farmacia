<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        return Compra::with('producto')->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_total' => 'required|numeric|min:0',
        ]);

        return Compra::create($request->all());
    }

    public function show(Compra $compra)
    {
        return $compra->load('producto');
    }

    public function update(Request $request, Compra $compra)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_total' => 'required|numeric|min:0',
        ]);

        $compra->update($request->all());
        return $compra;
    }

    public function destroy(Compra $compra)
    {
        $compra->delete();
        return response()->noContent();
    }
}