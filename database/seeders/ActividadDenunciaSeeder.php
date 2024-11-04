<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadDenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actividad_denuncia')->insert([
            'actividad_denuncia' => 'Actividad 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('actividad_denuncia')->insert([
            'actividad_denuncia' => 'Actividad 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
