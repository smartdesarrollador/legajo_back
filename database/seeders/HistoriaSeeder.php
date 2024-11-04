<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('historia')->insert([
        ['id_empleador' => 1, 'id_trabajador' => 1, 'id_tipo_historia' => 1, 'id_evento' => 1, 'id_accion' => 1, 'id_severidad' => 1, 'fecha_inicio' => '2022-01-01', 'fecha_fin' => '2022-02-01', 'observacion' => 'Historial de evento 1', 'created_at' => now(), 'updated_at' => now()],
        ['id_empleador' => 2, 'id_trabajador' => 2, 'id_tipo_historia' => 2, 'id_evento' => 2, 'id_accion' => 2, 'id_severidad' => 2, 'fecha_inicio' => '2022-03-01', 'fecha_fin' => '2022-04-01', 'observacion' => 'Historial de evento 2', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
