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
        Schema::create('tipos_itens_solicitacao', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->decimal('limite_valor', 10, 2)->nullable();
            $table->boolean('valida_ceo')->default(false);
            $table->timestamps();
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_itens_solicitacao');
    }
};