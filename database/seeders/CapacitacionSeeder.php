<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapacitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('capacitacion')->insert([
        ['capacitacion' => 'Curso de Seguridad', 'id_empleador' => 1, 'id_trabajador' => 1, 'id_curso' => 1, 'id_estado_evaluacion' => 1, 'id_documento' => 1, 'id_instructor' => 1, 'fecha_inicio' => '2023-01-10', 'fecha_fin' => '2023-01-20', 'observacion' => 'Capacitación completada', 'created_at' => now(), 'updated_at' => now()],
        ['capacitacion' => 'Curso de Privacidad', 'id_empleador' => 2, 'id_trabajador' => 2, 'id_curso' => 2, 'id_estado_evaluacion' => 2, 'id_documento' => 2, 'id_instructor' => 2, 'fecha_inicio' => '2023-02-10', 'fecha_fin' => '2023-02-20', 'observacion' => 'Capacitación en proceso', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
