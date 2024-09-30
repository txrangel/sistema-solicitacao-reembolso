<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
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
}