<?php

namespace Database\Seeders;

use App\Models\PerfilPermissao;
use App\Models\Permissao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfisPermissoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissoes = Permissao::all();
        foreach ($permissoes as $permissao) {
            if ($permissao) {
                PerfilPermissao::create([
                    'perfil_id' => 1, // ID da role 'Administradores'
                    'permissao_id' => $permissao->id,
                ]);
            }
        }
    }
}