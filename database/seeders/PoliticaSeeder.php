<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('politica')->insert([
        ['politica' => 'Política de Seguridad', 'resumen' => 'Protocolo de seguridad 2022', 'id_tipo_politica' => 1, 'id_empleador' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['politica' => 'Política de Privacidad', 'resumen' => 'Reglamento de privacidad de datos', 'id_tipo_politica' => 2, 'id_empleador' => 2, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
