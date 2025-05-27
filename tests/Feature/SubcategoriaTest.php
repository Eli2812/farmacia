<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubcategoriaTest extends TestCase
{
    use RefreshDatabase;

    public function test_crear_subcategoria()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->postJson('/api/subcategorias', [
            'nombre' => 'Subcategoría 1',
            'categoria_id' => $categoria->id,
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('subcategorias', [
            'nombre' => 'Subcategoría 1',
            'categoria_id' => $categoria->id,
        ]);
    }

    public function test_actualizar_subcategoria()
    {
        $categoria = Categoria::factory()->create();
        $subcategoria = Subcategoria::factory()->create();

        $response = $this->putJson("/api/subcategorias/{$subcategoria->id}", [
            'nombre' => 'Subcategoría Actualizada',
            'categoria_id' => $categoria->id,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('subcategorias', [
            'nombre' => 'Subcategoría Actualizada',
            'categoria_id' => $categoria->id,
        ]);
    }

    public function test_eliminar_subcategoria()
    {
        $subcategoria = Subcategoria::factory()->create();

        $response = $this->deleteJson("/api/subcategorias/{$subcategoria->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('subcategorias', ['id' => $subcategoria->id]);
    }

    public function test_obtener_subcategoria()
    {
        $subcategoria = Subcategoria::factory()->create();

        $response = $this->getJson("/api/subcategorias/{$subcategoria->id}");
        $response->assertStatus(200);
        $response->assertJson([
            'id' => $subcategoria->id,
            'nombre' => $subcategoria->nombre,
            'categoria_id' => $subcategoria->categoria_id,
        ]);
    }
}