<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contratos')->insert([
            'id_contrato' => 1,
            'contrato' => "contrato 1",
            'id_empleador' => 1,
            'id_documento' => 1,
            'fecha' => '2023-11-01',
            'fecha_vencimiento' => "2024-10-01",
            'id_estado_contrato' => 1,
            'id_modalidad' => 1,
            'id_tipo_contrato' => 1,
        ]);

        DB::table('contratos')->insert([
            'id_contrato' => 2,
            'contrato' => "contrato 2",
            'id_empleador' => 1,
            'id_documento' => 1,
            'fecha' => '2023-11-01',
            'fecha_vencimiento' => "2024-10-01",
            'id_estado_contrato' => 1,
            'id_modalidad' => 1,
            'id_tipo_contrato' => 1,
        ]);

        DB::table('contratos')->insert([
            'id_contrato' => 3,
            'contrato' => "contrato 3",
            'id_empleador' => 1,
            'id_documento' => 1,
            'fecha' => '2023-11-01',
            'fecha_vencimiento' => "2024-10-01",
            'id_estado_contrato' => 1,
            'id_modalidad' => 1,
            'id_tipo_contrato' => 1,
        ]);
    }
}
