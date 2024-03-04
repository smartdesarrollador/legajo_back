<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modalidades')->insert([
            'id_modalidad' => 1,
            'modalidad' => 'Modalidad de trabajo remoto',
            'alerta' => 'Alerta 1',
        ]);

        DB::table('modalidades')->insert([
            'id_modalidad' => 2,
            'modalidad' => 'Modalidad de trabajo presencial',
            'alerta' => 'Alerta 2',
        ]);

        DB::table('modalidades')->insert([
            'id_modalidad' => 3,
            'modalidad' => 'Modalidad de trabajo híbrido',
            'alerta' => 'Alerta 3',
        ]);
    }
}
