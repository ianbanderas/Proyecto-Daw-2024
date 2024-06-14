<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class platosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "idPla" => $this->faker->unique()->numberBetween(1,10),
            "nombre" => $this->faker->word(),
            "descripcion" => $this->faker->sentence(),

            
        ];
    }
}
