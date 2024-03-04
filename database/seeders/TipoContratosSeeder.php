<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoContratosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 1,
            'tipo_contrato' => 'CONTRATO DE TRABAJO SUJETO A MODALIDAD POR INICIO DE ACTIVIDAD',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 2,
            'tipo_contrato' => 'CONTRATO DE TRABAJO SUJETO A MODALIDAD POR INCREMENTO DE ACTIVIDAD',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 3,
            'tipo_contrato' => 'CONTRATO DE TRABAJO SUJETO A MODALIDAD POR NECESIDAD DE MERCADO',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 4,
            'tipo_contrato' => 'CONTRATO DE TRABAJO SUJETO A MODALIDAD POR RECONVERSION EMPRESARIAL',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 5,
            'tipo_contrato' => 'CONTRATO DE TRABAJO DE NATURALEZA ACCIDENTAL BAJO LA MODALIDAD DE OCASIONAL',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 6,
            'tipo_contrato' => 'CONTRATO DE TRABAJO DE NATURALEZA ACCIDENTAL BAJO LA MODALIDAD DE SUPLENCIA',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 7,
            'tipo_contrato' => 'CONTRATO DE TRABAJO DE NATURALEZA ACCIDENTAL BAJO LA MODALIDAD DE EMERGENCIA',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 8,
            'tipo_contrato' => 'CONTRATO DE TRABAJO SUJETO A MODALIDAD POR OBRA DETERMINADA',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 9,
            'tipo_contrato' => 'CONTRATO DE TRABAJO SUJETO A MODALIDAD POR SERVICIO ESPECÍFICO',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 10,
            'tipo_contrato' => 'CONTRATO DE TRABAJO SUJETO A MODALIDAD INTERMITENTE',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 11,
            'tipo_contrato' => 'CONTRATO DE TRABAJO SUJETO A MODALIDAD DE CONTRATO DE TEMPORADA',
        ]);

        DB::table('tipo_contratos')->insert([
            'id_tipo_contrato' => 12,
            'tipo_contrato' => 'CONTRATO DE TRABAJO INNOMINADO A PLAZO FIJO',
        ]);

    }
}
