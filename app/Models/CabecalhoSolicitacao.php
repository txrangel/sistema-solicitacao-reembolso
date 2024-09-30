<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabecalhoSolicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'setor_id',
        'status_solicitacao_id',
        'observacao',
        'total',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    public function status()
    {
        return $this->belongsTo(StatusSolicitacao::class, 'status_solicitacao_id');
    }

    public function itens()
    {
        return $this->hasMany(ItemSolicitacao::class, 'cabecalho_solicitacao_id');
    }

    public function historicoAprovacoes()
    {
        return $this->hasMany(HistoricoAprovacao::class, 'solicitacao_id');
    }

    public function anexos()
    {
        return $this->hasMany(Anexo::class, 'solicitacao_id');
    }
}