<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itens_solicitacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabecalho_solicitacao_id')->constrained('cabecalho_solicitacoes')->onDelete('cascade');
            $table->foreignId('tipo_item_id')->constrained('tipos_itens_solicitacao');
            $table->integer('quantidade');
            $table->decimal('valor_unitario', 10, 2);
            $table->boolean('dentro_limite')->default(true);
            $table->boolean('aprovado_gestor')->nullable();
            $table->boolean('aprovado_ceo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_solicitacao');
    }
};