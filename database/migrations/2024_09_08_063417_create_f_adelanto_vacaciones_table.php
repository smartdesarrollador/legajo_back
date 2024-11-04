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
        Schema::create('f_adelanto_vacaciones', function (Blueprint $table) {
            $table->id('id_f_adelanto_vacaciones');
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable();
        $table->unsignedBigInteger('id_vacaciones')->nullable();
        $table->string('periodo_actual', 20)->nullable();
        $table->string('periodo_restante', 20)->nullable();
        $table->integer('dias_adelantados')->nullable();
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
        Schema::dropIfExists('f_adelanto_vacaciones');
    }
};
