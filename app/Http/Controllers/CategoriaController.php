<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required']);
        return Categoria::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return $categoria;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate(['nombre' => 'required']);
        $categoria->update($request->all());
        return $categoria;
    }

    /**
     * Remove the specified resource from storage.
     */
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
