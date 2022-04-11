<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Autor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Knjiga>
 */
class KnjigaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'naslov' => $this->faker->word,
            'zanr'=>$this->faker->randomElement($array=array('drama', 'fikcija', 'ljubavni', 'triler', 'biografija')),
            'godina_izdanja' => $this->faker->numberBetween($min = 1980, $max = 2010),
            'izdavac'=>$this->faker->randomElement($array=array('Vulkan', 'Laguna')),
            'autor_id'=> Autor::factory()
        ];
    }
}
