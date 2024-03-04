<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id("id_documento");
            $table->unsignedBigInteger('id_empleador')->nullable();
            $table->foreign("id_empleador")->references("id_empleador")->on("empleadores")->onDelete("set null");
            $table->string("documento", 100)->nullable();
            $table->string("resumen", 100)->nullable();
            $table->string("version", 100)->nullable();
            $table->date('fecha_version')->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->string("archivo", 100)->nullable();
            $table->string("filename", 100)->nullable();
            $table->string("mimetype", 100)->nullable();
            $table->date('fecha_actualizado')->nullable();
            $table->unsignedBigInteger('id_trabajador')->nullable();
            $table->foreign("id_trabajador")->references("id_trabajador")->on("trabajadores")->onDelete("set null");
            /* $table->unsignedBigInteger('id_usuario')->nullable(); */
            /* $table->foreign("id_usuario")->references("id_usuario")->on("usuarios")->onDelete("set null"); */
            /* $table->unsignedBigInteger('id_tipo_archivo')->nullable(); */
            /* $table->foreign("id_tipo_archivo")->references("id_tipo_archivo")->on("tipo_archivos")->onDelete("set null"); */
            $table->string("url_publico", 100)->nullable();
            /* $table->unsignedBigInteger('id_clase_documento')->nullable(); */
            /* $table->foreign("id_clase_documento")->references("id_clase_documento")->on("tipoproducto")->onDelete("set null"); */



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
