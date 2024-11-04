<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbigeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ubigeo')->insert([
        ['ubigeo' => '150101', 'departamento' => 'Lima', 'provincia' => 'Lima', 'distrito' => 'Lima', 'created_at' => now(), 'updated_at' => now()],
        ['ubigeo' => '150102', 'departamento' => 'Lima', 'provincia' => 'Lima', 'distrito' => 'Ate', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
