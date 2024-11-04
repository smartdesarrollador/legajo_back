<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacto')->insert([
        ['contacto' => 'Juan Pérez', 'id_empleador' => 1, 'id_tipo_contacto' => 1, 'id_area' => 1, 'telefono' => '987654321', 'celular' => '987654321', 'correo' => 'juan@empresaA.com', 'created_at' => now(), 'updated_at' => now()],
        ['contacto' => 'Ana Gómez', 'id_empleador' => 2, 'id_tipo_contacto' => 2, 'id_area' => 2, 'telefono' => '987654123', 'celular' => '987654123', 'correo' => 'ana@empresaB.com', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
