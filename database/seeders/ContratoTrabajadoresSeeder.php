<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratoTrabajadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('contrato_trabajadores')->insert([
            'id_contrato_trabajadores' => 1,
            'id_trabajador' => 1,
            'id_contrato' => 2,
        ]);

        DB::table('contrato_trabajadores')->insert([
            'id_contrato_trabajadores' => 2,
            'id_trabajador' => 1,
            'id_contrato' => 1,
        ]);

        DB::table('contrato_trabajadores')->insert([
            'id_contrato_trabajadores' => 3,
            'id_trabajador' => 1,
            'id_contrato' => 3,
        ]);
    }
}
