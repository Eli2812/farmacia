<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function index()
    {
        return Subcategoria::with('categoria')->paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        return Subcategoria::create($request->all());
    }

    public function show(Subcategoria $subcategoria)
    {
        return $subcategoria->load('categoria');
    }

    public function update(Request $request, Subcategoria $subcategoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $subcategoria->update($request->all());
        return $subcategoria;
    }

    public function destroy(Subcategoria $subcategoria)
    {
        $subcategoria->delete();
        return response()->noContent();
    }
}