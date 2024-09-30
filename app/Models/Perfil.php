<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfis';
    protected $fillable = ['nome'];

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class, 'perfis_permissoes');
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'usuarios_perfis');
    }
}