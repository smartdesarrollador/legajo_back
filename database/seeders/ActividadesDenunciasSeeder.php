<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesDenunciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('actividades_denuncias')->insert([
            'id_actividad_denuncia' => 1,
            'actividad_denuncia' => "Actividad denuncia 1",
        ]);

        DB::table('actividades_denuncias')->insert([
            'id_actividad_denuncia' => 2,
            'actividad_denuncia' => "Actividad denuncia 2",
        ]);

        DB::table('actividades_denuncias')->insert([
            'id_actividad_denuncia' => 3,
            'actividad_denuncia' => "Actividad denuncia 3",
        ]);
    }
}
