<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrato>
 */
class ContratoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contrato' => fake()->word(),
            'id_empleador' => fake()->numberBetween(DB::table('empleadores')->min('id_empleador'), DB::table('empleadores')->max('id_empleador')),
            'id_documento' => fake()->numberBetween(DB::table('documentos')->min('id_documento'), DB::table('documentos')->max('id_documento')),
            'fecha' => fake()->date('Y-m-d', 'now'),
            'fecha_vencimiento' => fake()->date('Y-m-d', 'now'),
            'id_estado_contrato' => fake()->numberBetween(DB::table('estado_contratos')->min('id_estado_contrato'), DB::table('estado_contratos')->max('id_estado_contrato')),
            'id_modalidad' => fake()->numberBetween(DB::table('modalidades')->min('id_modalidad'), DB::table('modalidades')->max('id_modalidad')),
            'id_tipo_contrato' => fake()->numberBetween(DB::table('tipo_contratos')->min('id_tipo_contrato'), DB::table('tipo_contratos')->max('id_tipo_contrato')),

        ];
    }
}
