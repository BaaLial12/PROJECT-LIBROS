<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'titulo' => $this->faker->word(),
            'resumen' => $this->faker->sentence(3),
            'pvp' => $this->faker->randomFloat(2,1,999),
            'stock' => random_int(0,1000),
            'user_id' => User::all()->random()->id
        ];
    }
}
