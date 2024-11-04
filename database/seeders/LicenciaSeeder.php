<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LicenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('licencia')->insert([
        ['fecha_emision' => '2023-01-10', 'fecha_inicio' => '2023-01-15', 'fecha_fin' => '2023-01-20', 'jefe_vacaciones' => 'Carlos Gómez', 'motivo' => 'Licencia por vacaciones', 'id_area' => 1, 'id_trabajador' => 1, 'id_estado_permiso' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['fecha_emision' => '2023-02-05', 'fecha_inicio' => '2023-02-10', 'fecha_fin' => '2023-02-15', 'jefe_vacaciones' => 'Ana Pérez', 'motivo' => 'Licencia por estudios', 'id_area' => 2, 'id_trabajador' => 2, 'id_estado_permiso' => 2, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
