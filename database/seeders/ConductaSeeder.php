<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conducta;
class ConductaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conducta::create(['nombre' => 'Bebidas alcoholicas', 'puntaje' =>-6]);
        Conducta::create(['nombre' => 'Palabras soeces', 'puntaje' =>-2]);
        Conducta::create(['nombre' => 'Representacion escolar', 'puntaje' =>4]);
        Conducta::create(['nombre' => 'Apoyo estudiantil', 'puntaje' =>1]);
    }
}
