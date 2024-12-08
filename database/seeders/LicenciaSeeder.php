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
            [
                'fecha_emision' => '2023-01-10',
                'fecha_inicio' => '2023-01-15', 
                'fecha_fin' => '2023-01-20',
                'jefe_vacaciones' => 'Carlos Gómez',
                'motivo' => 'Licencia por vacaciones',
                'id_area' => 1,
                'id_trabajador' => 1,
                'id_estado_permiso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_emision' => '2023-02-05',
                'fecha_inicio' => '2023-02-10',
                'fecha_fin' => '2023-02-15', 
                'jefe_vacaciones' => 'Ana Pérez',
                'motivo' => 'Licencia por estudios',
                'id_area' => 2,
                'id_trabajador' => 2,
                'id_estado_permiso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_emision' => '2023-03-15',
                'fecha_inicio' => '2023-03-20',
                'fecha_fin' => '2023-03-25',
                'jefe_vacaciones' => 'Miguel Torres',
                'motivo' => 'Licencia por enfermedad',
                'id_area' => 3,
                'id_trabajador' => 3,
                'id_estado_permiso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_emision' => '2023-04-10',
                'fecha_inicio' => '2023-04-15',
                'fecha_fin' => '2023-04-20',
                'jefe_vacaciones' => 'Laura Ramírez',
                'motivo' => 'Licencia por capacitación',
                'id_area' => 1,
                'id_trabajador' => 4,
                'id_estado_permiso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_emision' => '2023-05-05',
                'fecha_inicio' => '2023-05-10',
                'fecha_fin' => '2023-05-15',
                'jefe_vacaciones' => 'Pedro Sánchez',
                'motivo' => 'Licencia por asuntos personales',
                'id_area' => 2,
                'id_trabajador' => 5,
                'id_estado_permiso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_emision' => '2023-06-20',
                'fecha_inicio' => '2023-06-25',
                'fecha_fin' => '2023-06-30',
                'jefe_vacaciones' => 'Carlos Gómez',
                'motivo' => 'Licencia por vacaciones',
                'id_area' => 3,
                'id_trabajador' => 1,
                'id_estado_permiso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_emision' => '2023-07-15',
                'fecha_inicio' => '2023-07-20',
                'fecha_fin' => '2023-07-25',
                'jefe_vacaciones' => 'Ana Pérez',
                'motivo' => 'Licencia por estudios',
                'id_area' => 1,
                'id_trabajador' => 2,
                'id_estado_permiso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_emision' => '2023-08-10',
                'fecha_inicio' => '2023-08-15',
                'fecha_fin' => '2023-08-20',
                'jefe_vacaciones' => 'Miguel Torres',
                'motivo' => 'Licencia por enfermedad',
                'id_area' => 2,
                'id_trabajador' => 3,
                'id_estado_permiso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_emision' => '2023-09-05',
                'fecha_inicio' => '2023-09-10',
                'fecha_fin' => '2023-09-15',
                'jefe_vacaciones' => 'Laura Ramírez',
                'motivo' => 'Licencia por capacitación',
                'id_area' => 3,
                'id_trabajador' => 4,
                'id_estado_permiso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'fecha_emision' => '2023-10-20',
                'fecha_inicio' => '2023-10-25',
                'fecha_fin' => '2023-10-30',
                'jefe_vacaciones' => 'Pedro Sánchez',
                'motivo' => 'Licencia por asuntos personales',
                'id_area' => 1,
                'id_trabajador' => 5,
                'id_estado_permiso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
