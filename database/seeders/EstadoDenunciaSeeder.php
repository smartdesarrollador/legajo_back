<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoDenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_denuncia')->insert([
        ['estado_denuncia' => 'Abierta', 'created_at' => now(), 'updated_at' => now()],
        ['estado_denuncia' => 'Cerrada', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
