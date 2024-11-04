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
        Schema::create('historial_vacaciones', function (Blueprint $table) {
            $table->id('id_historial_vacaciones');
        $table->string('historial_vacaciones', 200)->nullable();
        $table->date('fecha')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->integer('dias')->nullable();
        $table->unsignedBigInteger('id_tipo_movimiento')->nullable();
        $table->string('comentarios', 500)->nullable()->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        $table->foreign('id_tipo_movimiento')->references('id_tipo_movimiento')->on('tipo_movimiento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_vacaciones');
    }
};
