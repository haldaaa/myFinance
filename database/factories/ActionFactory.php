<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Action>
 */
class ActionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nomAction' => $this->faker->company,
            'quantite' => $this->faker->numberBetween(0, 650),
            'prix' => $this->faker->randomFloat(3, 50, 350),
        ];
    }
}
