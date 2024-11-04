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
        Schema::create('f_acumulacion_vacaciones', function (Blueprint $table) {
            $table->id('id_f_acumulacion_vacaciones', 6);
        $table->date('fecha_acumulacion')->nullable();
        $table->integer('dias_acumulados')->nullable();
        $table->unsignedBigInteger('id_vacaciones')->nullable();
        $table->string('periodo_acumulado', 20)->nullable();
        $table->integer('nro_dias_acumulados')->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_vacaciones')->references('id_vacaciones')->on('vacaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_acumulacion_vacaciones');
    }
};
