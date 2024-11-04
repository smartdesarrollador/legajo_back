<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accion')->insert([
            'accion' => 'Accion 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('accion')->insert([
            'accion' => 'Accion 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
