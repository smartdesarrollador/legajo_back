<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegimenPensionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regimen_pensiones')->insert([
        ['regimen_pensiones' => 'ONP', 'created_at' => now(), 'updated_at' => now()],
        ['regimen_pensiones' => 'AFP', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
