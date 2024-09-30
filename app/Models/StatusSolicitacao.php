<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusSolicitacao extends Model
{
    use HasFactory;

    protected $table = 'status_solicitacoes';
    protected $fillable = ['descricao'];

    public function solicitacoes()
    {
        return $this->hasMany(CabecalhoSolicitacao::class, 'status_solicitacao_id');
    }
}