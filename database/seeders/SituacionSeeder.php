<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SituacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('situacion')->insert([
        ['situacion' => 'Activo', 'created_at' => now(), 'updated_at' => now()],
        ['situacion' => 'Cesado', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
