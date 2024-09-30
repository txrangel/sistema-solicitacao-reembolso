<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = [
            "nome" => "Administrador",
            "email" => ENV('EMAIL_ADMIN'),
            'password'=> Hash::make(ENV('SENHA_ADMIN')),
        ];

        User::create($usuario);
    }
}