<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('documentos')->insert([
            'id_documento' => 1,
            'id_empleador' => 1,
            'documento' => 'documento 1',
            'resumen' => 'resumen 1',
            'version' => 'version 1',
            'fecha_version' => '2023-11-10',
            'archivo' => 'archivo 1',
            'filename' => 'filename 1',
            'mimetype' => 'mimetype 1',
            'fecha_actualizado' => '2023-11-01',
            'id_trabajador' => 1,
            'url_publico' => 'url_1',
        ]);

        DB::table('documentos')->insert([
            'id_documento' => 2,
            'id_empleador' => 2,
            'documento' => 'documento 1',
            'resumen' => 'resumen 1',
            'version' => 'version 1',
            'fecha_version' => '2023-11-10',
            'archivo' => 'archivo 1',
            'filename' => 'filename 1',
            'mimetype' => 'mimetype 1',
            'fecha_actualizado' => '2023-11-01',
            'id_trabajador' => 1,
            'url_publico' => 'url_1',
        ]);

        DB::table('documentos')->insert([
            'id_documento' => 3,
            'id_empleador' => 3,
            'documento' => 'documento 1',
            'resumen' => 'resumen 1',
            'version' => 'version 1',
            'fecha_version' => '2023-11-10',
            'archivo' => 'archivo 1',
            'filename' => 'filename 1',
            'mimetype' => 'mimetype 1',
            'fecha_actualizado' => '2023-11-01',
            'id_trabajador' => 1,
            'url_publico' => 'url_1',
        ]);
    }
}
