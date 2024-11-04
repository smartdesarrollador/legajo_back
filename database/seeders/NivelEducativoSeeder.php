<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelEducativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nivel_educativo')->insert([
        ['nivel_educativo' => 'Primaria completa', 'created_at' => now(), 'updated_at' => now()],
        ['nivel_educativo' => 'Secundaria completa', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
