<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoriaDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('historia_d')->insert([
        ['id_historia' => 1, 'id_documento' => 1, 'id_situacion' => 1, 'comentario' => 'Comentario historia 1', 'created_at' => now(), 'updated_at' => now()],
        ['id_historia' => 2, 'id_documento' => 2, 'id_situacion' => 2, 'comentario' => 'Comentario historia 2', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
