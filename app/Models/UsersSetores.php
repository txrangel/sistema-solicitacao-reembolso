<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersSetores extends Model
{
    protected $table = 'usuarios_setores';
    protected $fillable = [
        'usuario_id',
        'setor_id'
    ];
    use HasFactory;
}