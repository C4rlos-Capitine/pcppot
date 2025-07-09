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
        Schema::create('consultas_publicas', function (Blueprint $table) {
            $table->id('id_consulta');
            $table->string('nome_completo', 255);
            $table->date('data_nascimento');
            $table->enum('genero', ['masculino', 'feminino', 'outro']);
            $table->string('numero_bi', 20);
            $table->string('email', 255);
            $table->unsignedBigInteger('id_bairro');
            $table->unsignedBigInteger('id_plano');
            $table->text('comentario')->nullable();
            $table->string('ficheiro_upload')->nullable(); // Caminho do arquivo
            $table->timestamps();

            // Chave estrangeira para a tabela bairros
            $table->foreign('id_bairro')
                ->references('id_bairro')
                ->on('bairros')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Chave estrangeira para a tabela planos
            $table->foreign('id_plano')
                ->references('id_plano')
                ->on('planos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas_publicas');
    }
};