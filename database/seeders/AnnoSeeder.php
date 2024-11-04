<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anno')->insert([
        ['anno' => '2022', 'created_at' => now(), 'updated_at' => now()],
        ['anno' => '2023', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
