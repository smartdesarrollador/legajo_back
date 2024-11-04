<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vacaciones')->insert([
        ['fecha_solicitud' => '2023-01-01', 'fecha_inicio' => '2023-02-01', 'fecha_fin' => '2023-02-10', 'dias' => 10, 'id_tipo_vacaciones' => 1, 'id_trabajador' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['fecha_solicitud' => '2023-03-01', 'fecha_inicio' => '2023-04-01', 'fecha_fin' => '2023-04-10', 'dias' => 10, 'id_tipo_vacaciones' => 2, 'id_trabajador' => 2, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
