<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipocontactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_contacto')->insert([
        ['tipo_contacto' => 'Teléfono', 'created_at' => now(), 'updated_at' => now()],
        ['tipo_contacto' => 'Correo electrónico', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
