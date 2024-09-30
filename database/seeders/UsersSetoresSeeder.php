<?php

namespace Database\Seeders;

use App\Models\Setor;
use App\Models\UsersSetores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSetoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setores = Setor::all();
        foreach ($setores as $setor) {
            if ($setor) {
                UsersSetores::create([
                    'usuario_id' => 1, // ID do usuario 'Administrador'
                    'setor_id' => $setor->id,
                ]);
            }
        }
    }
}