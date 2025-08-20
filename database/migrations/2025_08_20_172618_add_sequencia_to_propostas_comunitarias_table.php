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
        Schema::table('propostas_comunitarias', function (Blueprint $table) {
            if (!Schema::hasColumn('propostas_comunitarias', 'sequencia')) {
                $table->integer('sequencia')->nullable();
            }
            if (!Schema::hasColumn('propostas_comunitarias', 'codigo')) {
                $table->string('codigo', 50)->unique();
            }
            if (!Schema::hasColumn('propostas_comunitarias', 'status')) {
                $table->string('status', 50)->default('pendente');
            }
            if (!Schema::hasColumn('propostas_comunitarias', 'data_resposta')) {
                $table->timestamp('data_resposta')->nullable();
            }
            if (!Schema::hasColumn('propostas_comunitarias', 'resposta')) {
                $table->string('resposta', 500)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('propostas_comunitarias', function (Blueprint $table) {
            //
        });
    }
};
