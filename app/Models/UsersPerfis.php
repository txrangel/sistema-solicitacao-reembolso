<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPerfis extends Model
{
    protected $table = 'usuarios_perfis';
    protected $fillable = [
        'usuario_id',
        'perfil_id'
    ];
    use HasFactory;
}