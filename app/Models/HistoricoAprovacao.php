<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoAprovacao extends Model
{
    use HasFactory;
    protected $table = 'historico_aprovacoes';
    protected $fillable = [
        'solicitacao_id',
        'usuario_id',
        'status_anterior',
        'status_atual',
        'observacao',
        'data_mudanca',
    ];

    public function solicitacao()
    {
        return $this->belongsTo(CabecalhoSolicitacao::class, 'solicitacao_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function statusAnterior()
    {
        return $this->belongsTo(StatusSolicitacao::class, 'status_anterior');
    }

    public function statusAtual()
    {
        return $this->belongsTo(StatusSolicitacao::class, 'status_atual');
    }
}