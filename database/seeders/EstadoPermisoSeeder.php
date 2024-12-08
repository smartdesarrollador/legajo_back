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
            [
                'estado_permiso' => 'Aprobado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_permiso' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_permiso' => 'Rechazado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_permiso' => 'En Revisión',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_permiso' => 'Cancelado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_permiso' => 'Vencido',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_permiso' => 'En Proceso',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_permiso' => 'Suspendido',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_permiso' => 'Anulado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'estado_permiso' => 'Finalizado',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
