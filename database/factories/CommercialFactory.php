<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commercial>
 */
class CommercialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'budget' => $this->faker->randomFloat(3, 99000, 1000000) // Génère un nombre décimal aléatoire avec 2 décimales, compris entre 100 et 10000
        ];
    }
    
}
