<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadorRegimenLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleador_regimen_laboral')->insert([
        ['empleador_regimen_laboral' => 'Regimen Público', 'id_empleador' => 1, 'id_regimen_laboral' => 1, 'created_at' => now(), 'updated_at' => now()],
        ['empleador_regimen_laboral' => 'Regimen Privado', 'id_empleador' => 2, 'id_regimen_laboral' => 2, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
