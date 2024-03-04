<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles_usuarios')->insert([
            'id_rol_user' => 1,
            'id_rol' => 1,
            'id_user' => 2,
        ]);

        DB::table('roles_usuarios')->insert([
            'id_rol_user' => 2,
            'id_rol' => 2,
            'id_user' => 1,
        ]);

        DB::table('roles_usuarios')->insert([
            'id_rol_user' => 3,
            'id_rol' => 3,
            'id_user' => 3,
        ]);
    }
}
