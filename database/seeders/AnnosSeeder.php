<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('annos')->insert([
            'id_anno' => 1,
            'anno' => "1",
        ]);

        DB::table('annos')->insert([
            'id_anno' => 2,
            'anno' => "2",
        ]);

        DB::table('annos')->insert([
            'id_anno' => 3,
            'anno' => "3",
        ]);
    }
}
