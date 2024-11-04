<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rol_user')->insert([
            'id_rol_user' => 1,
            'id_rol' => 1,
            'id_user' => 1,
        ]);

        DB::table('rol_user')->insert([
            'id_rol_user' => 2,
            'id_rol' => 2,
            'id_user' => 2,
        ]);

        DB::table('rol_user')->insert([
            'id_rol_user' => 3,
            'id_rol' => 2,
            'id_user' => 3,
        ]);

        DB::table('rol_user')->insert([
            'id_rol_user' => 4,
            'id_rol' => 3,
            'id_user' => 4,
        ]);

        DB::table('rol_user')->insert([
            'id_rol_user' => 5,
            'id_rol' => 3,
            'id_user' => 5,
        ]);

        DB::table('rol_user')->insert([
            'id_rol_user' => 6,
            'id_rol' => 3,
            'id_user' => 6,
        ]);

        DB::table('rol_user')->insert([
            'id_rol_user' => 7,
            'id_rol' => 3,
            'id_user' => 7,
        ]);

        DB::table('rol_user')->insert([
            'id_rol_user' => 8
        ]);

    }
}
