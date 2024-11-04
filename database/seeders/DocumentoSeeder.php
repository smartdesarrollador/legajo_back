<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('documento')->insert([
        ['documento' => 'Contrato Laboral', 'resumen' => 'Contrato firmado en 2020', 'version' => '1.0', 'fecha_version' => '2020-01-01', 'fecha_vencimiento' => '2025-01-01', 'archivo' => 'contract_2020.pdf', 'filename' => 'contract_2020.pdf', 'mimetype' => 'application/pdf', 'actualizado' => '2020-01-01', 'id_empleador' => 1, 'id_trabajador' => 1, 'id_tipo_archivo' => 1, 'url_publico' => 'https://docs.com/contract_2020', 'id_clase_documento' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['documento' => 'Planilla 2021', 'resumen' => 'Planilla de pagos 2021', 'version' => '1.0', 'fecha_version' => '2021-12-31', 'fecha_vencimiento' => '2022-12-31', 'archivo' => 'planilla_2021.pdf', 'filename' => 'planilla_2021.pdf', 'mimetype' => 'application/pdf', 'actualizado' => '2021-12-31', 'id_empleador' => 2, 'id_trabajador' => 2, 'id_tipo_archivo' => 1, 'url_publico' => 'https://docs.com/planilla_2021', 'id_clase_documento' => 2, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
