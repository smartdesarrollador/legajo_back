<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notificacion')->insert([
        ['notificacion' => 'Notificación por correo', 'created_at' => now(), 'updated_at' => now()],
        ['notificacion' => 'Notificación por SMS', 'created_at' => now(), 'updated_at' => now()],
    ]);
    }
}
