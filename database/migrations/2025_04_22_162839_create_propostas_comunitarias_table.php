<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('propostas_comunitarias', function (Blueprint $table) {
            $table->id('id_proposta');
            $table->string('nome_proponente', 255);
            $table->string('contacto', 255);
            $table->unsignedBigInteger('id_bairro');
            $table->text('descricao_proposta');
            $table->enum('tipo_intervencao', ['infraestrutura', 'espaco_publico', 'equipamento_social', 'uso_do_solo', 'outro']);
            $table->string('localizacao')->nullable();
            $table->string('documento_apoio')->nullable();
            $table->timestamps();

            $table->foreign('id_bairro')
                ->references('id_bairro')
                ->on('bairros')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('propostas_comunitarias');
    }
};