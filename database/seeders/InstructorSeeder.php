<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instructor')->insert([
        ['instructor' => 'Carlos Gómez', 'created_at' => now(), 'updated_at' => now()],
        ['instructor' => 'Ana Pérez', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
