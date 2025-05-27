<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

    public function test_crear_categoria()
    {
        $response = $this->postJson('/api/categorias', ['nombre' => 'Medicamentos']);
        $response->assertStatus(201);
        $this->assertDatabaseHas('categorias', ['nombre' => 'Medicamentos']);
    }

    public function test_actualizar_categoria()
    {
        $categoria = Categoria::factory()->create();
        $response = $this->putJson("/api/categorias/{$categoria->id}", ['nombre' => 'Vitaminas']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('categorias', ['nombre' => 'Vitaminas']);
    }
}