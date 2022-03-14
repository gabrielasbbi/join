<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_categoria_produto' => Category::factory(),
            'data_cadastro' => $this->faker->dateTime,
            'nome_produto' => 'Product '.Str::random(10),
            'valor_produto' => $this->faker->randomFloat(1, 1, 1),
        ];
    }
}
