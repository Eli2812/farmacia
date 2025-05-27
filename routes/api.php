<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

Route::post('/login', [AuthController::class, 'login']);

Route::post('/contacto', function(Request $request) {
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'mensaje' => 'required|string|max:2000',
    ]);

}
    return response()->json(['message' => 'Mensaje recibido'], 200);
});

Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('productos', ProductoController::class);

<router-link to="/contacto">Contacto</router-link>
