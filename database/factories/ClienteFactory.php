<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'endereco' => $this->faker->address,
            'logradouro' => $this->faker->word,
            'cep' => $this->faker->postcode,
            'bairro' => $this->faker->word,
        ];
    }
}
