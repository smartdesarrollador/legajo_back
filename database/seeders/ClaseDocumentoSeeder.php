<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaseDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clase_documento')->insert([
        ['clase_documento' => 'Contrato', 'created_at' => now(), 'updated_at' => now()],
        ['clase_documento' => 'Planilla', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
