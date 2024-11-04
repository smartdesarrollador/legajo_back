<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_denuncia')->insert([
        ['tipo_denuncia' => 'Acoso laboral', 'created_at' => now(), 'updated_at' => now()],
        ['tipo_denuncia' => 'Discriminación', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
