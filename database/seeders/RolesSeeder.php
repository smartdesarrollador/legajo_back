<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('roles')->insert([
            'id_rol' => 1,
            'nombre' => "Admin",
            'descripcion' => "Administrador del sistema",
        ]);

        DB::table('roles')->insert([
            'id_rol' => 2,
            'nombre' => "Empleador",
            'descripcion' => "Empresa",
        ]);

        DB::table('roles')->insert([
            'id_rol' => 3,
            'nombre' => "Trabajador",
            'descripcion' => "Trabajador",
        ]);
    }
}
