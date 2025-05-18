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
        Schema::table('planos', function (Blueprint $table) {
            // Adiciona a coluna id_tipo_plano e define a chave estrangeira
            $table->unsignedBigInteger('id_tipo_plano')->after('id_plano')->nullable();
            $table->foreign('id_tipo_plano')
                ->references('id_tipo_plano')
                ->on('tipo_planos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Adiciona a coluna Objectivo do Plano
            $table->string('Objectivo do Plano', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('planos', function (Blueprint $table) {
            // Remove a chave estrangeira e a coluna id_tipo_plano
            $table->dropForeign(['id_tipo_plano']);
            $table->dropColumn('id_tipo_plano');

            // Remove a coluna Objectivo do Plano
            $table->dropColumn('Objectivo do Plano');
        });
    }
};