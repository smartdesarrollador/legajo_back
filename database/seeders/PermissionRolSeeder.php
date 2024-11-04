<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('permission_rol')->insert([
            'id_permission_rol' => 1,
            'id_permission' => 1,
            'id_rol' => 2,
        ]);

        DB::table('permission_rol')->insert([
            'id_permission_rol' => 2,
            'id_permission' => 2,
            'id_rol' => 1,
        ]);

        DB::table('permission_rol')->insert([
            'id_permission_rol' => 3,
            'id_permission' => 3,
            'id_rol' => 3,
        ]);
    }
}
