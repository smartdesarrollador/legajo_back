<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DenunciaDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('denuncia_d')->insert([
        ['id_denuncia' => 1, 'id_actividad_denuncia' => 1, 'id_documento' => 1, 'detalle_denuncia' => 'Detalles de la denuncia 1', 'secuencia' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['id_denuncia' => 2, 'id_actividad_denuncia' => 2, 'id_documento' => 2, 'detalle_denuncia' => 'Detalles de la denuncia 2', 'secuencia' => 1, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
