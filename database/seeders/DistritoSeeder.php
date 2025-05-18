<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistritoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('distritos')->insert([
            ['nome_distrito' => 'KaMaxakene', 'created_at' => now(), 'updated_at' => now()],
            ['nome_distrito' => 'KaMavota', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
