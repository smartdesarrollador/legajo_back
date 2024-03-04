<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleadores')->insert([
            'id_empleador' => 1,
            'empleador' => "Jacky",
            'ruc' => "20690506095",
            'domicilio' => 'Av. Arequipa 1549, Lince',
            'representante_legal' => 'Jacky',
            'dni_representante_legal' => "190980098",
            'cargo_representante_legal' => "Gerente General",
            'numero_partida_poderes' => '1745',
            'numero_asiento' => "0185",
            'oficina_registral' => 'Lima',
            'numero_partida_registral' => '7185',
            'fecha_inicio_actividades' => '18-11-2023',
            'id_actividad_economica' => 1,
            'id_user' => 1,
        ]);

        DB::table('empleadores')->insert([
            'id_empleador' => 2,
            'empleador' => "Juan",
            'ruc' => "20690506095",
            'domicilio' => 'Av. Canevaro 3514, Lince',
            'representante_legal' => 'Juan',
            'dni_representante_legal' => "190980098",
            'cargo_representante_legal' => "Analista de Sistemas",
            'numero_partida_poderes' => '1745',
            'numero_asiento' => "0185",
            'oficina_registral' => 'Lima',
            'numero_partida_registral' => '7185',
            'fecha_inicio_actividades' => '18-11-2023',
            'id_actividad_economica' => 2,
            'id_user' => 2,
        ]);
    
        DB::table('empleadores')->insert([
            'id_empleador' => 3,
            'empleador' => "James",
            'ruc' => "20690506095",
            'domicilio' => 'Av. Arenales 1549, Lince',
            'representante_legal' => 'James',
            'dni_representante_legal' => "190980098",
            'cargo_representante_legal' => "Gerente General",
            'numero_partida_poderes' => '1748',
            'numero_asiento' => "0185",
            'oficina_registral' => 'Lima',
            'numero_partida_registral' => '7185',
            'fecha_inicio_actividades' => '19-11-2023',
            'id_actividad_economica' => 1,
            'id_user' => 3,
        ]);
    }
}
