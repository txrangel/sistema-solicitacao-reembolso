<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('perfis_permissoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perfil_id')->constrained('perfis')->onDelete('cascade');
            $table->foreignId('permissao_id')->constrained('permissoes')->onDelete('cascade');
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfis_permissoes');
    }
};