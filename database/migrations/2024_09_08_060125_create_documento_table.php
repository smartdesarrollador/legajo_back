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
        Schema::create('documento', function (Blueprint $table) {
            $table->id('id_documento');
        $table->unsignedBigInteger('id_empleador')->nullable();
        $table->string('documento', 500)->nullable();
        $table->string('resumen', 200)->nullable();
        $table->string('version', 20)->nullable();
        $table->date('fecha_version')->nullable();
        $table->date('fecha_vencimiento')->nullable();
        $table->binary('archivo')->nullable();
        $table->string('filename', 100)->nullable();
        $table->string('mimetype', 100)->nullable();
        $table->date('actualizado')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable()->nullable();
        $table->unsignedBigInteger('id_usuario')->nullable()->nullable();
        $table->unsignedBigInteger('id_tipo_archivo')->nullable();
        $table->string('url_publico', 500)->nullable();
        $table->unsignedBigInteger('id_clase_documento')->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        $table->foreign('id_usuario')->references('id_usuario')->on('usuario')->onDelete('cascade');
        $table->foreign('id_tipo_archivo')->references('id_tipo_archivo')->on('tipo_archivo')->onDelete('cascade');
        $table->foreign('id_clase_documento')->references('id_clase_documento')->on('clase_documento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento');
    }
};
