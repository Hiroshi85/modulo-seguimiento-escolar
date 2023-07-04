<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Psicologo;
use App\Models\Auxiliar;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "Bruno",
            'email' => "t033300120@unitru.edu.pe",
            'password' => Hash::make(env("ADMIN_USER_PASSWORD")),
        ]);
        $user->assignRole('admin');

        $this->crearPsicologo();
        $this->crearAuxiliar();
        
    }

    private function crearPsicologo(): void{
        $user = User::create([
            'name' => "María",
            'email' => "maria@gmail.com",
            'password' => Hash::make(env("ADMIN_USER_PASSWORD")),
        ]);
        $user->assignRole('psicologo');

        Psicologo::create([
            'nombres' => "María",
            'apellidos' => 'Martinez',
            'telefono' => '987654321',
            'genero' => 'F',
            'correo' => 'maria@gmail.com',
            'user_id' => $user->id,
        ]);
    }

    private function crearAuxiliar(): void{
        $user = User::create([
            'name' => "Marcos",
            'email' => "marcos@gmail.com",
            'password' => Hash::make(env("ADMIN_USER_PASSWORD")),
        ]);
        $user->assignRole('auxiliar');

        Auxiliar::create([
            'nombres' => "Marcos",
            'apellidos' => 'Quispe',
            'telefono' => '987654321',
            'genero' => 'M',
            'correo' => 'marcos@gmail.com',
            'user_id' => $user->id,
        ]);
    }
}
