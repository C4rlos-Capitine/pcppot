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
        Schema::create('bairros', function (Blueprint $table) {
            $table->id('id_bairro');
            $table->string('nome_bairro', 100);
            $table->unsignedBigInteger('id_distrito');
            $table->timestamps();

            // Definição da chave estrangeira
            $table->foreign('id_distrito')
                ->references('id_distrito')
                ->on('distritos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bairros');
    }
};