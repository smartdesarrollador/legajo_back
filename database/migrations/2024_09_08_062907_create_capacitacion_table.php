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
        Schema::create('capacitacion', function (Blueprint $table) {
            $table->id('id_capacitacion');
        $table->string('capacitacion', 200)->nullable();
        $table->unsignedBigInteger('id_empleador')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->unsignedBigInteger('id_curso')->nullable();
        $table->unsignedBigInteger('id_estado_evaluacion')->nullable();
        $table->unsignedBigInteger('id_documento')->nullable();
        $table->unsignedBigInteger('id_instructor')->nullable();
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable();
        $table->string('observacion', 500)->nullable()->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        $table->foreign('id_curso')->references('id_curso')->on('curso')->onDelete('cascade');
        $table->foreign('id_estado_evaluacion')->references('id_estado_evaluacion')->on('estado_evaluacion')->onDelete('cascade');
        $table->foreign('id_documento')->references('id_documento')->on('documento')->onDelete('cascade');
        $table->foreign('id_instructor')->references('id_instructor')->on('instructor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacitacion');
    }
};
