<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Drzava;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Autor>
 */
class AutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ime'=> $this->faker->firstName(),
            'prezime' => $this->faker->lastName(),
            'godina_rodjenja'=>$this->faker->numberBetween($min=1960, $max=1999),
            'drzava_id'=>Drzava::factory()
        ];
    }
}
