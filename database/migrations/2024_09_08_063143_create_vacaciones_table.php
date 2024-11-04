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
        Schema::create('vacaciones', function (Blueprint $table) {
            $table->id('id_vacaciones');
        $table->date('fecha_solicitud')->nullable();
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable();
        $table->integer('dias')->nullable();
        $table->unsignedBigInteger('id_tipo_vacaciones')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_tipo_vacaciones')->references('id_tipo_vacaciones')->on('tipo_vacaciones')->onDelete('cascade');
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacaciones');
    }
};
