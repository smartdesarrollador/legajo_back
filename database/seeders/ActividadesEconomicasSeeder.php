<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesEconomicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actividades_economicas')->insert([
            'id_actividad_economica' => 1,
            'actividad_economica' => "Tecnología de la Información",
        ]);

        DB::table('actividades_economicas')->insert([
            'id_actividad_economica' => 2,
            'actividad_economica' => "Servicios de Consultoría y Asesoría",
        ]);

        DB::table('actividades_economicas')->insert([
            'id_actividad_economica' => 3,
            'actividad_economica' => "Medios de Comunicación",
        ]);

        DB::table('actividades_economicas')->insert([
            'id_actividad_economica' => 4,
            'actividad_economica' => "Servicios de salud y bienestar",
        ]);

        DB::table('actividades_economicas')->insert([
            'id_actividad_economica' => 5,
            'actividad_economica' => "Servicios financieros y bancarios",
        ]);
    }
}
