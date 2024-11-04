<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegimenSaludSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regimen_salud')->insert([
        ['regimen_salud' => 'EsSalud', 'created_at' => now(), 'updated_at' => now()],
        ['regimen_salud' => 'EPS', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
