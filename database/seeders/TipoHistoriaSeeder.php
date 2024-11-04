<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoHistoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_historia')->insert([
            'tipo_historia' => 'Tipo Historia 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tipo_historia')->insert([
            'tipo_historia' => 'Tipo Historia 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
