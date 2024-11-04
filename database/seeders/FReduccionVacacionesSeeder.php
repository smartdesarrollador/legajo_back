<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FReduccionVacacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('f_reduccion_vacaciones')->insert([
        ['fecha_inicio' => '2023-01-15', 'fecha_fin' => '2023-01-20', 'id_vacaciones' => 1, 'periodo_inicio_laboral' => '2023-01', 'periodo_fin_laboral' => '2023-02', 'nro_dias_reduccion' => 5, 'created_at' => now(), 'updated_at' => now()],
        ['fecha_inicio' => '2023-04-01', 'fecha_fin' => '2023-04-05', 'id_vacaciones' => 2, 'periodo_inicio_laboral' => '2023-03', 'periodo_fin_laboral' => '2023-04', 'nro_dias_reduccion' => 5, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
