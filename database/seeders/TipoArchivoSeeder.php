<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoArchivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_archivo')->insert([
        ['tipo_archivo' => 'PDF', 'icono' => 'pdf-icon', 'created_at' => now(), 'updated_at' => now()],
        ['tipo_archivo' => 'Word', 'icono' => 'word-icon', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
