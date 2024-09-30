<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function setores()
    {
        return $this->belongsToMany(Setor::class, 'usuarios_setores');
    }

    public function perfis()
    {
        return $this->belongsToMany(Perfil::class, 'usuarios_perfis');
    }

    public function solicitacoes()
    {
        return $this->hasMany(CabecalhoSolicitacao::class, 'usuario_id');
    }

    public function historicoAprovacoes()
    {
        return $this->hasMany(HistoricoAprovacao::class, 'usuario_id');
    }

    // Novo método para verificar permissões
    public function hasPermission($permissionName)
    {
        foreach ($this->perfis as $perfil) {
            if ($perfil->permissoes()->where('nome', $permissionName)->exists()) {
                return true;
            }
        }
        return false;
    }
}
