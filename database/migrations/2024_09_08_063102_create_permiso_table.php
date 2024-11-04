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
        Schema::create('permiso', function (Blueprint $table) {
            $table->id('id_permiso');
        $table->string('permiso', 200)->nullable();
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable();
        $table->integer('horas')->nullable();
        $table->unsignedBigInteger('id_area')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->string('jefe_inmediato', 200)->nullable();
        $table->string('motivo', 500)->nullable();
        $table->binary('adjunto')->nullable();
        $table->unsignedBigInteger('id_estado_permiso')->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_area')->references('id_area')->on('area')->onDelete('cascade');
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        $table->foreign('id_estado_permiso')->references('id_estado_permiso')->on('estado_permiso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permisos');
    }
};
