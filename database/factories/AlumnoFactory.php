<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombres" => fake()->firstName(), 
            "apellidos"=> fake()->lastName(), 
            "fechaNacimiento"=> fake()->dateTimeBetween('-17 years', '-10 years'), 
            "genero" =>fake()->randomElement(['M', 'F']),
            "apoderado_id" =>fake()->numberBetween(1, 10),
        ];
    }
}
