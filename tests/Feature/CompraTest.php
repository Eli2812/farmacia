<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompraTest extends TestCase
{
    use RefreshDatabase;

    public function test_crear_compra()
    {
        $producto = Producto::factory()->create();

        $response = $this->postJson('/api/compras', [
            'producto_id' => $producto->id,
            'cantidad' => 5,
            'precio_total' => 500.00,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('compras', [
            'producto_id' => $producto->id,
            'cantidad' => 5,
            'precio_total' => 500.00,
        ]);
    }

    public function test_actualizar_compra()
    {
        $producto = Producto::factory()->create();
        $compra = Compra::factory()->create();

        $response = $this->putJson("/api/compras/{$compra->id}", [
            'producto_id' => $producto->id,
            'cantidad' => 10,
            'precio_total' => 1000.00,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('compras', [
            'producto_id' => $producto->id,
            'cantidad' => 10,
            'precio_total' => 1000.00,
        ]);
    }

    public function test_eliminar_compra()
    {
        $compra = Compra::factory()->create();

        $response = $this->deleteJson("/api/compras/{$compra->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('compras', ['id' => $compra->id]);
    }

    public function test_obtener_compra()
    {
        $compra = Compra::factory()->create();

        $response = $this->getJson("/api/compras/{$compra->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $compra->id,
            'producto_id' => $compra->producto_id,
            'cantidad' => $compra->cantidad,
            'precio_total' => $compra->precio_total,
        ]);
    }
}