<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apoderado>
 */
class ApoderadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => fake()->firstName(), 
            'apellidos' => fake()->lastName(), 
            'telefono' => fake()->numerify('9########'), 
            'correo' => fake()->unique()->safeEmail(), 
            "fechaNacimiento"=> fake()->dateTimeBetween('-50 years', '-20 years'), 
            // 'edad' => fake()->numberBetween(20,50),
        ];
    }
}
