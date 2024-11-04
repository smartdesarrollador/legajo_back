<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('area')->insert([
        ['area' => 'Recursos Humanos', 
        'created_at' => now(), 
        'updated_at' => now()],

        ['area' => 'Finanzas', 
        'created_at' => now(), 
        'updated_at' => now()],
        ]);
    }
}
