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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id('id_documento');
            $table->unsignedBigInteger('documentoplano_id');
            $table->unsignedBigInteger('id_plano');
            $table->string('nome_documento', 100);
            $table->string('path', 255);
            $table->timestamps();

            // Definição das chaves estrangeiras
            $table->foreign('documentoplano_id')
                ->references('documentoplano_id')
                ->on('documentacao_planos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_plano')
                ->references('id_plano')
                ->on('planos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Definição de índice único
            $table->unique(['id_documento', 'documentoplano_id', 'id_plano'], 'unique_documento_combination');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
