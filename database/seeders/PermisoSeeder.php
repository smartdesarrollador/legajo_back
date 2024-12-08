<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permiso')->insert([
            [
                'permiso' => 'Permiso Médico',
                'fecha_inicio' => '2023-02-15',
                'fecha_fin' => '2023-02-18', 
                'horas' => 8,
                'id_area' => 1,
                'id_trabajador' => 1,
                'jefe_inmediato' => 'Carlos Gómez',
                'motivo' => 'Consulta médica',
                'adjunto' => 'permiso_medico.pdf',
                'id_estado_permiso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permiso' => 'Permiso Personal',
                'fecha_inicio' => '2023-03-10',
                'fecha_fin' => '2023-03-12',
                'horas' => 16,
                'id_area' => 2, 
                'id_trabajador' => 2,
                'jefe_inmediato' => 'Ana Pérez',
                'motivo' => 'Trámite personal',
                'adjunto' => 'permiso_personal.pdf',
                'id_estado_permiso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permiso' => 'Permiso Familiar',
                'fecha_inicio' => '2023-04-20',
                'fecha_fin' => '2023-04-21',
                'horas' => 16,
                'id_area' => 3,
                'id_trabajador' => 3,
                'jefe_inmediato' => 'Luis Ramírez',
                'motivo' => 'Emergencia familiar',
                'adjunto' => 'permiso_familiar.pdf',
                'id_estado_permiso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permiso' => 'Permiso Capacitación',
                'fecha_inicio' => '2023-05-15',
                'fecha_fin' => '2023-05-16',
                'horas' => 16,
                'id_area' => 1,
                'id_trabajador' => 4,
                'jefe_inmediato' => 'María Torres',
                'motivo' => 'Curso de actualización',
                'adjunto' => 'permiso_capacitacion.pdf',
                'id_estado_permiso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permiso' => 'Permiso Médico',
                'fecha_inicio' => '2023-06-05',
                'fecha_fin' => '2023-06-05',
                'horas' => 4,
                'id_area' => 2,
                'id_trabajador' => 5,
                'jefe_inmediato' => 'Jorge Mendoza',
                'motivo' => 'Exámenes médicos',
                'adjunto' => 'permiso_medico_2.pdf',
                'id_estado_permiso' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permiso' => 'Permiso Personal',
                'fecha_inicio' => '2023-07-12',
                'fecha_fin' => '2023-07-12',
                'horas' => 8,
                'id_area' => 4,
                'id_trabajador' => 1,
                'jefe_inmediato' => 'Carlos Gómez',
                'motivo' => 'Trámites bancarios',
                'adjunto' => 'permiso_banco.pdf',
                'id_estado_permiso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permiso' => 'Permiso Estudios',
                'fecha_inicio' => '2023-08-20',
                'fecha_fin' => '2023-08-20',
                'horas' => 4,
                'id_area' => 3,
                'id_trabajador' => 2,
                'jefe_inmediato' => 'Ana Pérez',
                'motivo' => 'Examen universitario',
                'adjunto' => 'permiso_universidad.pdf',
                'id_estado_permiso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permiso' => 'Permiso Familiar',
                'fecha_inicio' => '2023-09-01',
                'fecha_fin' => '2023-09-02',
                'horas' => 16,
                'id_area' => 1,
                'id_trabajador' => 3,
                'jefe_inmediato' => 'Luis Ramírez',
                'motivo' => 'Evento familiar',
                'adjunto' => 'permiso_familiar_2.pdf',
                'id_estado_permiso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permiso' => 'Permiso Médico',
                'fecha_inicio' => '2023-10-15',
                'fecha_fin' => '2023-10-15',
                'horas' => 8,
                'id_area' => 2,
                'id_trabajador' => 4,
                'jefe_inmediato' => 'María Torres',
                'motivo' => 'Tratamiento dental',
                'adjunto' => 'permiso_dental.pdf',
                'id_estado_permiso' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'permiso' => 'Permiso Capacitación',
                'fecha_inicio' => '2023-11-10',
                'fecha_fin' => '2023-11-11',
                'horas' => 16,
                'id_area' => 3,
                'id_trabajador' => 5,
                'jefe_inmediato' => 'Jorge Mendoza',
                'motivo' => 'Seminario profesional',
                'adjunto' => 'permiso_seminario.pdf',
                'id_estado_permiso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
