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
            [
                'fecha_solicitud' => '2023-01-01',
                'fecha_inicio' => '2023-02-01',
                'fecha_fin' => '2023-02-10',
                'dias' => 10,
                'id_tipo_vacaciones' => 1,
                'id_trabajador' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_solicitud' => '2023-03-01',
                'fecha_inicio' => '2023-04-01',
                'fecha_fin' => '2023-04-10',
                'dias' => 10,
                'id_tipo_vacaciones' => 2,
                'id_trabajador' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_solicitud' => '2023-05-15',
                'fecha_inicio' => '2023-06-01',
                'fecha_fin' => '2023-06-15',
                'dias' => 15,
                'id_tipo_vacaciones' => 1,
                'id_trabajador' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_solicitud' => '2023-06-20',
                'fecha_inicio' => '2023-07-01',
                'fecha_fin' => '2023-07-07',
                'dias' => 7,
                'id_tipo_vacaciones' => 2,
                'id_trabajador' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_solicitud' => '2023-07-15',
                'fecha_inicio' => '2023-08-01',
                'fecha_fin' => '2023-08-20',
                'dias' => 20,
                'id_tipo_vacaciones' => 1,
                'id_trabajador' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_solicitud' => '2023-08-10',
                'fecha_inicio' => '2023-09-01',
                'fecha_fin' => '2023-09-05',
                'dias' => 5,
                'id_tipo_vacaciones' => 2,
                'id_trabajador' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_solicitud' => '2023-09-15',
                'fecha_inicio' => '2023-10-01',
                'fecha_fin' => '2023-10-12',
                'dias' => 12,
                'id_tipo_vacaciones' => 1,
                'id_trabajador' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_solicitud' => '2023-10-20',
                'fecha_inicio' => '2023-11-15',
                'fecha_fin' => '2023-11-25',
                'dias' => 10,
                'id_tipo_vacaciones' => 2,
                'id_trabajador' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_solicitud' => '2023-11-01',
                'fecha_inicio' => '2023-12-15',
                'fecha_fin' => '2023-12-30',
                'dias' => 15,
                'id_tipo_vacaciones' => 1,
                'id_trabajador' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_solicitud' => '2023-11-25',
                'fecha_inicio' => '2024-01-02',
                'fecha_fin' => '2024-01-16',
                'dias' => 14,
                'id_tipo_vacaciones' => 2,
                'id_trabajador' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
