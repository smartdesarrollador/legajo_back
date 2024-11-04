<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
       DB::table('sector')->insert([
        ['sector' => 'Industria', 'created_at' => now(), 'updated_at' => now()],
        ['sector' => 'Comercio', 'created_at' => now(), 'updated_at' => now()],
    ]); 
    }
}
