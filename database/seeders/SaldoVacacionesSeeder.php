<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaldoVacacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('saldo_vacaciones')->insert([
        ['id_trabajador' => 1, 'anno' => '2023', 'dias_acumulados' => 20, 'dias_vencidos' => 0, 'dias_usados' => 10, 'saldo_vacaciones' => 10, 'created_at' => now(), 'updated_at' => now()],
        ['id_trabajador' => 2, 'anno' => '2023', 'dias_acumulados' => 15, 'dias_vencidos' => 0, 'dias_usados' => 5, 'saldo_vacaciones' => 10, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
