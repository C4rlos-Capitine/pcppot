<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_planoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_planos')->insert([
            [
                'nome_tipo_plano' => 'Planos de Estrutura Urbana',
                'descripcion_tipo_plano' => 'Planos que definem a estrutura urbana de uma área.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_tipo_plano' => 'Planos Gerais de Urbanização',
                'descripcion_tipo_plano' => 'Planos que abrangem a urbanização geral de uma região.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_tipo_plano' => 'Planos Parciais de Urbanização',
                'descripcion_tipo_plano' => 'Planos que tratam da urbanização de áreas específicas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_tipo_plano' => 'Planos de Pormenor ',
                'descripcion_tipo_plano' => 'Planos de Pormenor.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}