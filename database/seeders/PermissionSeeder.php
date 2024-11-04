<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('permission')->insert([
            'id_permission' => 1,
            'nombre' => "Listar",
            'descripcion' => "Mostrar lista de datos",
        ]);

        DB::table('permission')->insert([
            'id_permission' => 2,
            'nombre' => "Crear",
            'descripcion' => "Crear un registro",
        ]);

        DB::table('permission')->insert([
            'id_permission' => 3,
            'nombre' => "Editar",
            'descripcion' => "Editar un registro",
        ]);

        DB::table('permission')->insert([
            'id_permission' => 4,
            'nombre' => "Eliminar",
            'descripcion' => "Eliminar un registro",
        ]);

         DB::table('permission')->insert([
            'id_permission' => 5,
            'nombre' => "Restaurar",
            'descripcion' => "Restaurar un registro",
        ]);

    }
}
