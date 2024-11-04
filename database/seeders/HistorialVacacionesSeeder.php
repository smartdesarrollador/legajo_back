<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorialVacacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('historial_vacaciones')->insert([
        ['historial_vacaciones' => 'Uso de vacaciones 2023', 'fecha' => '2023-02-15', 'id_trabajador' => 1, 'dias' => 5, 'id_tipo_movimiento' => 1, 'comentarios' => 'Vacaciones usadas en febrero', 'created_at' => now(), 'updated_at' => now()],
        ['historial_vacaciones' => 'Uso de vacaciones 2023', 'fecha' => '2023-04-15', 'id_trabajador' => 2, 'dias' => 5, 'id_tipo_movimiento' => 2, 'comentarios' => 'Vacaciones usadas en abril', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
