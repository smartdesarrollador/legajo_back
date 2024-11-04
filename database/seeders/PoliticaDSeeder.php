<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliticaDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('politica_d')->insert([
        ['id_politica' => 1, 'secuencia' => 1, 'resumen' => 'Protocolo de seguridad actualizado', 'id_documento' => 1, 'id_actividad_denuncia' => 1, 'enviar_correo' => true, 'requiere_cargo' => false, 'created_at' => now(), 'updated_at' => now()],
        ['id_politica' => 2, 'secuencia' => 1, 'resumen' => 'Política de privacidad para datos', 'id_documento' => 2, 'id_actividad_denuncia' => 1, 'enviar_correo' => true, 'requiere_cargo' => false, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
