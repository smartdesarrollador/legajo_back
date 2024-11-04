<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_contrato')->insert([
        ['estado_contrato' => 'Vigente', 'created_at' => now(), 'updated_at' => now()],
        ['estado_contrato' => 'Terminado', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
