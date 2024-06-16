<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class usuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "idUsu" => $this->faker->unique()->numberBetween(1,10),
            "nombre" => $this->faker->unique()->word(),  
            "password" => Hash::make(1234),
            "perfil" => $this->faker->numberBetween(1,2),

        ];
    }
}
