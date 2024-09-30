<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    use HasFactory;

    protected $fillable = [
        'solicitacao_id',
        'arquivo',
        'nome_original',
        'tipo',
    ];

    public function solicitacao()
    {
        return $this->belongsTo(CabecalhoSolicitacao::class, 'solicitacao_id');
    }
}