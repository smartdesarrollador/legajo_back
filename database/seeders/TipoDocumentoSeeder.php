<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_documento')->insert([
        ['tipo_documento' => 'DNI', 'created_at' => now(), 'updated_at' => now()],
        ['tipo_documento' => 'Pasaporte', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
