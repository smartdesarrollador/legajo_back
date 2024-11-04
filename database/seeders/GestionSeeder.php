<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gestion')->insert([
        ['gestion' => 'Gestión de Planilla 2020', 'id_periodo' => 1, 'id_documento' => 1, 'id_trabajador' => 1, 'id_empleador' => 1, 'id_clase_documento' => 1, 'fecha' => '2020-01-01', 'created_at' => now(), 'updated_at' => now()],
        ['gestion' => 'Gestión de Planilla 2021', 'id_periodo' => 2, 'id_documento' => 2, 'id_trabajador' => 2, 'id_empleador' => 2, 'id_clase_documento' => 2, 'fecha' => '2021-12-31', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
