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
        Schema::create('planos', function (Blueprint $table) {
            $table->id('id_plano');
            $table->string('nome_plano', 100);
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->double('area_abrangida', 8, 2);
            $table->double('latitude', 10, 8);
            $table->double('longitude', 11, 8);
            $table->integer('habitantes_por_km2');
            $table->double('densidade_habitantes', 8, 2);
            $table->string('descricao_plano', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planos');
    }
};
