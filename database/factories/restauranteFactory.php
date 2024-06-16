<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class restauranteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "idRes" => $this->faker->unique()->numberBetween(1,10),
            "nombre" => $this->faker->unique()->word(),  
            "categoria" => $this->faker->word(),  
            "idUsu" => $this->faker->numberBetween(1,10),
            "idCiu" => $this->faker->numberBetween(1,10),
        ];
    }
}
