<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoItemSolicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'limite_valor',
        'valida_ceo',
    ];

    public function itensSolicitacao()
    {
        return $this->hasMany(ItemSolicitacao::class, 'tipo_item_id');
    }
}