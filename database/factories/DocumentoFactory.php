<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documento>
 */
class DocumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_empleador' => fake()->numberBetween(DB::table('empleadores')->min('id_empleador'), DB::table('empleadores')->max('id_empleador')),
            'documento' => fake()->word(),
            'resumen' => fake()->word(),
            'version' => fake()->numberBetween(1, 10),
            'fecha_version' => fake()->date('Y-m-d', 'now'),
            'fecha_vencimiento' => fake()->date('Y-m-d', 'now'),
            'archivo' => fake()->fileExtension(),
            'filename' => fake()->fileExtension(),
            'mimetype' => fake()->mimeType(),
            'fecha_actualizado' => fake()->date('Y-m-d', 'now'),
            'id_trabajador' => fake()->numberBetween(DB::table('trabajadores')->min('id_trabajador'), DB::table('trabajadores')->max('id_trabajador')),
            //'id_usuario' => fake()->numberBetween(DB::table('usuarios')->min('id_usuario'), DB::table('usuarios')->max('id_usuario')),
            //'id_tipo_archivo' => fake()->numberBetween(DB::table('tipo_archivos')->min('id_tipo_archivo'), DB::table('tipo_archivos')->max('id_tipo_archivo')),
            'url_publico' => fake()->url(),
            //'id_clase_documento' => fake()->numberBetween(DB::table('clase_documentos')->min('id_clase_documento'), DB::table('clase_documentos')->max('id_clase_documento')),


        ];
    }
}
