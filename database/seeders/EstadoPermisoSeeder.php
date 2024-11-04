<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_permiso')->insert([
        ['estado_permiso' => 'Aprobado', 'created_at' => now(), 'updated_at' => now()],
        ['estado_permiso' => 'Pendiente', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
