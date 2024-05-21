<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
use App\Models\Produto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venda>
 */
class VendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'numero_da_venda' => $this->faker->numberBetween(1, 10000),
            'cliente_id' => Cliente::factory(), // Associa com um cliente existente ou cria um novo
            'produto_id' => Produto::factory(), // Associa com um produto existente ou cria um novo
        ];
    }
}
