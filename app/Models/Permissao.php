<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;
    protected $table = 'permissoes';
    protected $fillable = ['nome', 'descricao'];

    public function perfis()
    {
        return $this->belongsToMany(Perfil::class, 'perfis_permissoes');
    }
}