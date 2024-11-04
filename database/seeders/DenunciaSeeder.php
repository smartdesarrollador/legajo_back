<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('denuncia')->insert([
        ['id_tipo_denuncia' => 1, 'id_empleador' => 1, 'id_trabajador' => 1, 'id_estado_denuncia' => 1, 'fecha_denuncia' => '2023-05-01', 'fecha_cierre' => '2023-06-01', 'numero_documento' => 'DOC123', 'created_at' => now(), 'updated_at' => now()],
        ['id_tipo_denuncia' => 2, 'id_empleador' => 2, 'id_trabajador' => 2, 'id_estado_denuncia' => 2, 'fecha_denuncia' => '2023-07-01', 'fecha_cierre' => null, 'numero_documento' => 'DOC456', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
