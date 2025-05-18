<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eventos_participacao_publica', function (Blueprint $table) {
            $table->id('id_evento');
            $table->string('nome_evento', 255);
            $table->text('descricao');
            $table->dateTime('data_hora');
            $table->string('local', 255);
            $table->enum('tipo_evento', ['audiencia_publica', 'reuniao_comunitaria', 'sessao_tecnica', 'outro']);
            $table->unsignedBigInteger('id_plano')->nullable();
            $table->string('organizador', 255);
            $table->string('contacto', 255);
            $table->string('link_inscricao')->nullable();
            $table->string('anexo')->nullable();
            $table->timestamps();

            $table->foreign('id_plano')
                ->references('id_plano')
                ->on('planos')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos_participacao_publica');
    }
};