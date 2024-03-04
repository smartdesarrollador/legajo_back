<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trabajadores')->insert([
            'trabajador' => "Johen",
            'apellido_paterno' => "Mendoza",
            'apellido_materno' => "Gutierrez",
            'primer_nombre' => "Johen",
            'segundo_nombre' => "Santos",
            //'id_tipo_documento' => TipoDocumento::all()->random()->id,
            'numero_documento' => "1598409980",
            'fecha_nacimiento' => "2023-11-18",
            'ruc' => "2098309920",
            'direccion' => "Av. Aviación 3541, San Borja",
            'referencia' => "Por Estacion del Tren",
            //'id_ubigeo' => Ubigeo::all()->random()->id,
            'telefono' => "909392091",
            'celular' => "9298192912",
            'correo' => "johen@testcorreo.com",
            'id_empleador' => 1,
            //'id_regimen_laboral' => RegimenLaboral::all()->random()->id,
            //'id_ocupacion' => Ocupacion::all()->random()->id,
            'id_tipo_contrato' => 1,
            //'id_jornada_laboral' => JornadaLaboral::all()->random()->id,
            //'id_estado_trabajador' => EstadoTrabajador::all()->random()->id,
            'fecha_estado' => "2023-11-18",
            //'id_regimen_salud' => RegimenSalud::all()->random()->id,
            //'id_regimen_pensiones' => RegimenPensiones::all()->random()->id,
            'id_afp' => 1,
            'cuspp' => "cuspp 1",
            'es_discapacitado' => "NO",
            'es_sindicalizado' => "NO",
            'fecha_ingreso' => "2021-10-01",
            'fecha_egreso' => "2023-10-10",
            //'id_motivo_baja' => MotivoBaja::all()->random()->id,
            'fecha_baja' => "2023-11-10",
        ]);
    }
}
