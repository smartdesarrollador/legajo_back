<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_contrato')->insert([
        ['tipo_contrato' => 'Indeterminado', 'created_at' => now(), 'updated_at' => now()],
        ['tipo_contrato' => 'A plazo fijo', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
