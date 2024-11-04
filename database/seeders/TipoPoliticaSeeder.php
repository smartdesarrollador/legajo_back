<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPoliticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_politica')->insert([
        ['tipo_politica' => 'Seguridad', 'created_at' => now(), 'updated_at' => now()],
        ['tipo_politica' => 'Privacidad', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
