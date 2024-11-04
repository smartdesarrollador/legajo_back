<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuario')->insert([
        ['usuario' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ['usuario' => 'jdoe', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
