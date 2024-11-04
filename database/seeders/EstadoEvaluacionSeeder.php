<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoEvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_evaluacion')->insert([
        ['estado_evaluacion' => 'Aprobado', 'created_at' => now(), 'updated_at' => now()],
        ['estado_evaluacion' => 'Pendiente', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
