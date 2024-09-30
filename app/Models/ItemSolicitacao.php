<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSolicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabecalho_solicitacao_id',
        'tipo_item_id',
        'quantidade',
        'valor_unitario',
        'dentro_limite',
        'aprovado_gestor',
        'aprovado_ceo',
    ];

    public function tipoItem()
    {
        return $this->belongsTo(TipoItemSolicitacao::class, 'tipo_item_id');
    }

    public function cabecalhoSolicitacao()
    {
        return $this->belongsTo(CabecalhoSolicitacao::class, 'cabecalho_solicitacao_id');
    }
}