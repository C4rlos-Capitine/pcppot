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
        Schema::table('contribuicoes', function (Blueprint $table) {
            if (!Schema::hasColumn('contribuicoes', 'sequencia')) {
                $table->integer('sequencia')->nullable()->after('id_contribuicao');
            }
            if (!Schema::hasColumn('contribuicoes', 'codigo')) {
                $table->string('codigo', 50)->unique()->after('sequencia');
            }
            if (!Schema::hasColumn('contribuicoes', 'status')) {
                $table->string('status', 50)->default('pendente')->after('sequencia');
            }
            if (!Schema::hasColumn('contribuicoes', 'data_resposta')) {
                $table->timestamp('data_resposta')->nullable()->after('status');
            }
            if (!Schema::hasColumn('contribuicoes', 'resposta')) {
                $table->string('resposta', 500)->nullable()->after('data_resposta');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contribuicoes', function (Blueprint $table) {
            //
        });
    }
};
