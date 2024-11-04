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
        Schema::create('contrato', function (Blueprint $table) {
            $table->id('id_contrato');
        $table->unsignedBigInteger('id_empleador')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->unsignedBigInteger('id_estado_contrato')->nullable();
        $table->unsignedBigInteger('id_jornada_laboral')->nullable();
        $table->unsignedBigInteger('id_cargo')->nullable();
        $table->unsignedBigInteger('id_funciones')->nullable();
        $table->unsignedBigInteger('id_regimen_laboral')->nullable();
        $table->unsignedBigInteger('id_tipo_contrato')->nullable();
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable()->nullable();
        $table->string('observacion', 500)->nullable()->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        $table->foreign('id_estado_contrato')->references('id_estado_contrato')->on('estado_contrato')->onDelete('cascade');
        $table->foreign('id_jornada_laboral')->references('id_jornada_laboral')->on('jornada_laboral')->onDelete('cascade');
        $table->foreign('id_cargo')->references('id_cargo')->on('cargo')->onDelete('cascade');
        $table->foreign('id_funciones')->references('id_funciones')->on('funciones')->onDelete('cascade');
        $table->foreign('id_regimen_laboral')->references('id_regimen_laboral')->on('regimen_laboral')->onDelete('cascade');
        $table->foreign('id_tipo_contrato')->references('id_tipo_contrato')->on('tipo_contrato')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrato');
    }
};
