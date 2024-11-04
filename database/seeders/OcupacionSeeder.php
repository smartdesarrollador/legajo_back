<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OcupacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ocupacion')->insert([
        ['ocupacion' => 'Ingeniero', 'created_at' => now(), 'updated_at' => now()],
        ['ocupacion' => 'Abogado', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
