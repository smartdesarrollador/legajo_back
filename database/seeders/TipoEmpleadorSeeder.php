<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEmpleadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_empleador')->insert([
            'tipo_empleador' => 'tipo empleador 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_empleador')->insert([
            'tipo_empleador' => 'tipo empleador 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_empleador')->insert([
            'tipo_empleador' => 'tipo empleador 3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
