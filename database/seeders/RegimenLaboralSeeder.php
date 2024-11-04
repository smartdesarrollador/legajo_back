<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegimenLaboralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regimen_laboral')->insert([
        ['regimen_laboral' => 'Público'],
        ['regimen_laboral' => 'Privado'],
        ['regimen_laboral' => 'Independiente'],
    ]);
    }
}
