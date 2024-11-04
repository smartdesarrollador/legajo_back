<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAcumulacionVacacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('f_acumulacion_vacaciones')->insert([
        ['fecha_acumulacion' => '2023-01-01', 'dias_acumulados' => 10, 'id_vacaciones' => 1, 'periodo_acumulado' => '2023-01', 'nro_dias_acumulados' => 10, 'created_at' => now(), 'updated_at' => now()],
        ['fecha_acumulacion' => '2023-02-01', 'dias_acumulados' => 5, 'id_vacaciones' => 2, 'periodo_acumulado' => '2023-02', 'nro_dias_acumulados' => 5, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
