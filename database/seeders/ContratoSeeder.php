<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contrato')->insert([
        ['id_empleador' => 1, 'id_trabajador' => 1, 'id_estado_contrato' => 1, 'id_jornada_laboral' => 1, 'id_cargo' => 1, 'id_funciones' => 1, 'id_regimen_laboral' => 1, 'id_tipo_contrato' => 1, 'fecha_inicio' => '2020-01-01', 'fecha_fin' => null, 'observacion' => 'Contrato indefinido', 'created_at' => now(), 'updated_at' => now()],
        ['id_empleador' => 2, 'id_trabajador' => 2, 'id_estado_contrato' => 2, 'id_jornada_laboral' => 2, 'id_cargo' => 2, 'id_funciones' => 2, 'id_regimen_laboral' => 2, 'id_tipo_contrato' => 2, 'fecha_inicio' => '2021-02-01', 'fecha_fin' => '2022-02-01', 'observacion' => 'Contrato a plazo fijo', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
