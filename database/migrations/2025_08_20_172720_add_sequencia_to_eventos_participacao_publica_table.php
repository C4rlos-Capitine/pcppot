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
        Schema::table('eventos_participacao_publica', function (Blueprint $table) {
            $table->integer('sequencia')->nullable()->after('id_evento');
            $table->string('codigo', 50)->unique()->after('sequencia');
            $table->string('status', 50)->default('pendente')->after('sequencia');
            $table->timestamp('data_resposta')->nullable()->after('status');
            $table->string('resposta', 500)->nullable()->after('data_resposta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos_participacao_publica', function (Blueprint $table) {
            //
        });
    }
};
