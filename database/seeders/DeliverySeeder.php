<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('delivery')->insert([
        ['id_empleador' => 1, 'id_trabajador' => 1, 'id_documento' => 1, 'id_notificacion' => 1, 'fecha_confirmacion' => '2023-03-01', 'confirmacion' => true, 'created_at' => now(), 'updated_at' => now()],
        ['id_empleador' => 2, 'id_trabajador' => 2, 'id_documento' => 2, 'id_notificacion' => 2, 'fecha_confirmacion' => '2023-04-01', 'confirmacion' => false, 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
