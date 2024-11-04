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
        ['permiso' => 'Permiso Médico', 'fecha_inicio' => '2023-02-15', 'fecha_fin' => '2023-02-18', 'horas' => 8, 'id_area' => 1, 'id_trabajador' => 1, 'jefe_inmediato' => 'Carlos Gómez', 'motivo' => 'Consulta médica', 'adjunto' => 'permiso_medico.pdf', 'id_estado_permiso' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['permiso' => 'Permiso Personal', 'fecha_inicio' => '2023-03-10', 'fecha_fin' => '2023-03-12', 'horas' => 16, 'id_area' => 2, 'id_trabajador' => 2, 'jefe_inmediato' => 'Ana Pérez', 'motivo' => 'Trámite personal', 'adjunto' => 'permiso_personal.pdf', 'id_estado_permiso' => 2, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
