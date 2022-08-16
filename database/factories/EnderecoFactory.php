<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'CEP' => fake()->numerify('#####-###'),
            'logradouro' => fake()->streetName(),
            'numero' => fake()->numberBetween(1, 500),
            'complemento' => fake()->sentence(3),
            'bairro' => fake()->sentence(2),
            'cidade' => fake()->city(),
            'estado' => fake()->country(),
        ];
    }
}
