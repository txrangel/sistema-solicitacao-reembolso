<?php

namespace Database\Seeders;

use App\Models\Perfil;
use App\Models\UsersPerfis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersPerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perfis = Perfil::all();
        foreach ($perfis as $perfil) {
            if ($perfil) {
                UsersPerfis::create([
                    'usuario_id' => 1, // ID do usuario 'Administrador'
                    'perfil_id' => $perfil->id,
                ]);
            }
        }
    }
}