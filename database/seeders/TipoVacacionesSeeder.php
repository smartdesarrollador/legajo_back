<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoVacacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_vacaciones')->insert([
        ['tipo_vacaciones' => 'Mensual', 'created_at' => now(), 'updated_at' => now()],
        ['tipo_vacaciones' => 'Anual', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
