<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_movimiento')->insert([
        ['tipo_movimiento' => 'Ingreso', 'created_at' => now(), 'updated_at' => now()],
        ['tipo_movimiento' => 'Egreso', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
