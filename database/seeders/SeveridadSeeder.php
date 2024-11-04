<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeveridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('severidad')->insert([    
            'severidad' => 'Severidad 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('severidad')->insert([
            'severidad' => 'Severidad 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
