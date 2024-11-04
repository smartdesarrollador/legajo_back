<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAdelantoVacacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('f_adelanto_vacaciones')->insert([
        ['fecha_inicio' => '2023-01-05', 'fecha_fin' => '2023-01-10', 'id_vacaciones' => 1, 'periodo_actual' => '2023-01', 'periodo_restante' => '2023-02', 'dias_adelantados' => 5, 'created_at' => now(), 'updated_at' => now()],
        ['fecha_inicio' => '2023-03-01', 'fecha_fin' => '2023-03-05', 'id_vacaciones' => 2, 'periodo_actual' => '2023-03', 'periodo_restante' => '2023-04', 'dias_adelantados' => 5, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
