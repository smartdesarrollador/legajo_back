<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoTrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_trabajador')->insert([
        ['estado_trabajador' => 'Activo', 'created_at' => now(), 'updated_at' => now()],
        ['estado_trabajador' => 'Suspendido', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
