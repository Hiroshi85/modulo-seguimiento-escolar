<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Apoderado;
use App\Models\TipoPrueba;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Apoderado::factory(10)->create();
        Alumno::factory(8)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TipoPruebaSeeder::class);
        $this->call(ConductaSeeder::class);
    }
}
