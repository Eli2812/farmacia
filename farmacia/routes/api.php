<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::apiResource('pedidos', PedidoController::class);