<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evento')->insert([
            'evento' => 'Evento 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('evento')->insert([
            'evento' => 'Evento 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
