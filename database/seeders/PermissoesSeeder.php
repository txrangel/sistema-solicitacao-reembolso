<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissao;

class PermissoesSeeder extends Seeder
{
    public function run()
    {
        $permissoes = [
            // Permissões para usuários
            ['nome' => 'visualizar_usuarios'],
            ['nome' => 'criar_usuarios'],
            ['nome' => 'editar_usuarios'],
            ['nome' => 'remover_usuarios'],

            // Permissões para setores
            ['nome' => 'visualizar_setores'],
            ['nome' => 'criar_setores'],
            ['nome' => 'editar_setores'],
            ['nome' => 'remover_setores'],

            // Permissões para perfis
            ['nome' => 'visualizar_perfis'],
            ['nome' => 'criar_perfis'],
            ['nome' => 'editar_perfis'],
            ['nome' => 'remover_perfis'],

            // Permissões para permissões
            ['nome' => 'visualizar_permissoes'],
            ['nome' => 'criar_permissoes'],
            ['nome' => 'editar_permissoes'],
            ['nome' => 'remover_permissoes'],

            // Permissões para solicitações
            ['nome' => 'visualizar_solicitacoes'],
            ['nome' => 'criar_solicitacoes'],
            ['nome' => 'editar_solicitacoes'],
            ['nome' => 'remover_solicitacoes'],
            ['nome' => 'aprovar_solicitacoes'],
            ['nome' => 'rejeitar_solicitacoes'],

            // Permissões para itens de solicitações
            ['nome' => 'visualizar_itens_solicitacao'],
            ['nome' => 'criar_itens_solicitacao'],
            ['nome' => 'editar_itens_solicitacao'],
            ['nome' => 'remover_itens_solicitacao'],
        ];

        foreach ($permissoes as $permissao) {
            Permissao::create($permissao);
        }
    }
}