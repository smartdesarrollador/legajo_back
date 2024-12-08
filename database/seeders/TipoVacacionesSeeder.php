<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoVacacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_vacaciones')->insert([
            [
                'tipo_vacaciones' => 'Mensual',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_vacaciones' => 'Anual', 
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_vacaciones' => 'Adelantadas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_vacaciones' => 'Fraccionadas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_vacaciones' => 'Compensadas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_vacaciones' => 'Truncas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_vacaciones' => 'Colectivas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_vacaciones' => 'Proporcionales',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_vacaciones' => 'Acumuladas',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_vacaciones' => 'Especiales',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
