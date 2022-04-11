<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drzava>
 */
class DrzavaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'naziv'=>$this->faker->country(),
           'brojStanovnika'=>$this->faker->numberBetween($min = 50000, $max = 1500000000)
        ];
    }
}
