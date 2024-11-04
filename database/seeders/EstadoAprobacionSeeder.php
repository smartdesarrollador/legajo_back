<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoAprobacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_aprobacion')->insert([
        ['estado_aprobacion' => 'Aprobado', 'id_vacaciones' => 1, 'aprobado_por' => 'Carlos Gómez', 'cargo' => 'Gerente', 'fecha_aprobacion' => '2023-01-15', 'comentario' => 'Vacaciones aprobadas', 'created_at' => now(), 'updated_at' => now()],
        ['estado_aprobacion' => 'Pendiente', 'id_vacaciones' => 2, 'aprobado_por' => 'Ana Pérez', 'cargo' => 'Gerente', 'fecha_aprobacion' => '2023-03-15', 'comentario' => 'En espera de confirmación', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
