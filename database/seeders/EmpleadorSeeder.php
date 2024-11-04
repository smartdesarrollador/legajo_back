<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleador')->insert([
        ['empleador' => 'Empresa A', 'ruc' => '20456378901','dni_representante_legal' => '456378901', 'domicilio' => 'Av. Principal 123', 'id_ubigeo' => 1, 'id_sector' => 1, 'id_actividad_economica' => 1,  'representante_legal' => 'Carlos Gómez', 'cargo_representante_legal' => 'Gerente General', 'numero_partida_poderes' => '1234', 'numero_asiento' => '5678', 'oficina_registral' => 'Lima', 'numero_partida_registral' => '87654321', 'fecha_inicio_actividades' => '2020-01-01','id_user' => 1, 'id_tipo_empleador' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['empleador' => 'Empresa B', 'ruc' => '20578965412','dni_representante_legal' => '456378954', 'domicilio' => 'Calle Secundaria 456', 'id_ubigeo' => 2, 'id_sector' => 2, 'id_actividad_economica' => 2, 'representante_legal' => 'Ana Pérez', 'cargo_representante_legal' => 'Gerente de Finanzas', 'numero_partida_poderes' => '2345', 'numero_asiento' => '6789', 'oficina_registral' => 'Lima', 'numero_partida_registral' => '87654322', 'fecha_inicio_actividades' => '2021-02-01','id_user' => 2, 'id_tipo_empleador' => 2, 'created_at' => now(), 'updated_at' => now()],
        ['empleador' => 'Empresa C', 'ruc' => '20578965894','dni_representante_legal' => '456378418', 'domicilio' => 'Calle Secundaria 451', 'id_ubigeo' => 2, 'id_sector' => 2, 'id_actividad_economica' => 2, 'representante_legal' => 'Ana Pérez', 'cargo_representante_legal' => 'Gerente de Finanzas', 'numero_partida_poderes' => '2345', 'numero_asiento' => '6789', 'oficina_registral' => 'Lima', 'numero_partida_registral' => '87654322', 'fecha_inicio_actividades' => '2021-02-01','id_user' => 3, 'id_tipo_empleador' => 3, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
