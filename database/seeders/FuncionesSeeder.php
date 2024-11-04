<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('funciones')->insert([
        ['funciones' => 'Administrativo', 'created_at' => now(), 'updated_at' => now()],
        ['funciones' => 'Operativo', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
