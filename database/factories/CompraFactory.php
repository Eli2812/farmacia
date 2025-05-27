<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    protected $model = Compra::class;

    public function definition()
    {
        return [
            'producto_id' => Producto::factory(),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'precio_total' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}