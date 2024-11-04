<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JornadaLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jornada_laboral')->insert([
        ['jornada_laboral' => 'Tiempo completo', 'created_at' => now(), 'updated_at' => now()],
        ['jornada_laboral' => 'Medio tiempo', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
