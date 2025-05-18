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
        Schema::create('contribuicoes', function (Blueprint $table) {
            $table->id('id_contribuicao');
            $table->enum('tipo_contribuicao', ['sugestao', 'reclamacao', 'pedido_esclarecimento']);
            $table->string('assunto', 255);
            $table->text('mensagem');
            $table->unsignedBigInteger('id_plano')->nullable(); // Opcional
            $table->string('nome_completo', 255);
            $table->string('email', 255);
            $table->string('contacto_telefonico', 20)->nullable(); // Opcional
            $table->string('anexo')->nullable(); // Caminho do arquivo
            $table->timestamps();

            // Chave estrangeira para a tabela planos (opcional)
            $table->foreign('id_plano')
                ->references('id_plano')
                ->on('planos')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contribuicoes');
    }
};