<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('acciones')->insert([
            'id_accion' => 1,
            'accion' => "Contratar",
            'plazo_dias' => 4,
        ]);

        DB::table('acciones')->insert([
            'id_accion' => 2,
            'accion' => "Movilizar",
            'plazo_dias' => 5,
        ]);

        DB::table('acciones')->insert([
            'id_accion' => 3,
            'accion' => "Gestionar",
            'plazo_dias' => 7,
        ]);
    }
}
