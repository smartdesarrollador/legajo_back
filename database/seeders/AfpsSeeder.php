<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AfpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('afps')->insert([
            'id_afp' => 1,
            'afp' => 'afp 1',
        ]);

        DB::table('afps')->insert([
            'id_afp' => 2,
            'afp' => 'afp 2',
        ]);
    
        DB::table('afps')->insert([
            'id_afp' => 3,
            'afp' => 'afp 3',
        ]);
    }
}
