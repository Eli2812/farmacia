<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pedido;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PedidoTest extends TestCase
{
    use RefreshDatabase;

    public function test_crear_pedido()
    {
        $response = $this->postJson('/api/pedidos', [
            'nombre' => 'Pedido 1',
            'cantidad' => 10,
            'precio' => 100.00
        ]);
        $response->assertStatus(201);
        $this->assertDatabaseHas('pedidos', [
            'nombre' => 'Pedido 1',
            'cantidad' => 10,
            'precio' => 100.00
        ]);
    }

    public function test_actualizar_pedido()
    {
        $pedido = Pedido::factory()->create();
        $response = $this->putJson("/api/pedidos/{$pedido->id}", [
            'nombre' => 'Pedido Actualizado',
            'cantidad' => 20,
            'precio' => 200.00
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('pedidos', [
            'nombre' => 'Pedido Actualizado',
            'cantidad' => 20,
            'precio' => 200.00
        ]);
    }

    public function test_eliminar_pedido()
    {
        $pedido = Pedido::factory()->create();
        $response = $this->deleteJson("/api/pedidos/{$pedido->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('pedidos', ['id' => $pedido->id]);
    }

    public function test_obtener_pedido()
    {
        $pedido = Pedido::factory()->create();
        $response = $this->getJson("/api/pedidos/{$pedido->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $pedido->id,
            'nombre' => $pedido->nombre,
            'cantidad' => $pedido->cantidad,
            'precio' => $pedido->precio,
        ]);
    }
}