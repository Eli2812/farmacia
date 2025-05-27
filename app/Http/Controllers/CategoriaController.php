<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoriaController extends Controller
{

    public function index()
    {
        return Categoria::paginate(10); // Devuelve 10 categorías por página
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
        ]);

        return Categoria::create($request->all());
    }

  
    public function show($id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            return $categoria;
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }
    }


    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $categoria->id,
        ]);

        $categoria->update($request->all());
        return $categoria;
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->noContent();
    }
}

import Categorias from '@/components/Categorias.vue'
import Productos from '@/components/Productos.vue'

const routes = [
  // ...otras rutas...
  { path: '/categorias', name: 'Categorias', component: Categorias },
  { path: '/productos', name: 'Productos', component: Productos },
]
