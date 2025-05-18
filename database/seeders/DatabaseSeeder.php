<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Us',
            'email' => 'carlos2@example.com',
            'password'=> Hash::make('zxcvbnm'),	
        ]);

        /*DB::table('distritos')->insert([
            ['nome_distrito' => 'KaMaxakene', 'created_at' => now(), 'updated_at' => now()],
            ['nome_distrito' => 'KaMavota', 'created_at' => now(), 'updated_at' => now()],

        ]);
        DB::table('documentacao_planos')->insert([
            ['nome_documento' => 'Minuta do Plano (PDF, DOC)', 'created_at' => now(), 'updated_at' => now()],
            ['nome_documento' => 'Mapas Geoespaciais (SIG, KML, GeoJSON)', 'created_at' => now(), 'updated_at' => now()],
            ['nome_documento' => 'Relatório Técnico Preliminar', 'created_at' => now(), 'updated_at' => now()],
            ['nome_documento' => '•	Estudos de Impacto Ambiental e Social', 'created_at' => now(), 'updated_at' => now()],
        ]);*/

    }
}
