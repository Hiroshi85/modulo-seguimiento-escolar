<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Apoderado;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Apoderado::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        // Apoderado::factory()
        // ->has(
        //     Alumno::factory()->count(1)
        //     ->state(function (array $attributes, Apoderado $apoderado){
        //     return ['apoderado_id' => $apoderado->id];
        // }), 'alumno')
        // ->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
