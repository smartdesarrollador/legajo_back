<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cargo')->insert([
        ['cargo' => 'Gerente', 'created_at' => now(), 'updated_at' => now()],
        ['cargo' => 'Supervisor', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
