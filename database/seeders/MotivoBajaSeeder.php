<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotivoBajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('motivo_baja')->insert([
        ['motivo_baja' => 'Renuncia voluntaria', 'created_at' => now(), 'updated_at' => now()],
        ['motivo_baja' => 'Despido', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
