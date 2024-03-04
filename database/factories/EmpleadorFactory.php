<?php

namespace Database\Factories;

/* use App\Models\Ubigeo;
use App\Models\Sector; */
use App\Models\ActividadEconomica;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleador>
 */
class EmpleadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empleador' => fake()->firstName(),
        'ruc' => fake()->numberBetween(900000000, 999999999),
        'domicilio' => fake()->secondaryAddress(),
        'representante_legal' => fake()->firstName(),
        'dni_representante_legal' => fake()->numberBetween(10000000, 99999999),
        'cargo_representante_legal' => fake()->catchPhrase(),
        'numero_partida_poderes' => fake()->numberBetween(0, 1000),
        'numero_asiento' => fake()->numberBetween(0, 1000),
        'oficina_registral' => "Lima",
        'numero_partida_registral' => fake()->numberBetween(0, 1000),
        'fecha_inicio_actividades' => fake()->date('Y-m-d', 'now'),
        /* 'id_ubigeo' => Ubigeo::all()->random()->id,
        'id_sector' => Sector::all()->random()->id */
        'id_actividad_economica' => fake()->numberBetween(DB::table('actividades_economicas')->min('id_actividad_economica'), DB::table('actividades_economicas')->max('id_actividad_economica')),
        ];
    }
}

