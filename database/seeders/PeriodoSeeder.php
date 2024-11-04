<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periodo')->insert([
        ['periodo' => '2024-01', 'corto' => 'Enero 2024', 'created_at' => now(), 'updated_at' => now()],
        ['periodo' => '2024-02', 'corto' => 'Febrero 2024', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
