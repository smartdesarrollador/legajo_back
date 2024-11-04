<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeriadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('feriado')->insert([
        ['feriado' => 'Día del Trabajador', 'id_anno' => 1, 'fecha' => '2024-05-01', 'created_at' => now(), 'updated_at' => now()],
        ['feriado' => 'Día de la Independencia', 'id_anno' => 2, 'fecha' => '2024-07-28', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
