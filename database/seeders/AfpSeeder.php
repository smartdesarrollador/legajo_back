<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AfpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('afp')->insert([
        ['afp' => 'Prima', 'created_at' => now(), 'updated_at' => now()],
        ['afp' => 'Integra', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
