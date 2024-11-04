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
        Schema::create('f_reduccion_vacaciones', function (Blueprint $table) {
            $table->id('id_f_reduccion_vacaciones');
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable();
        $table->unsignedBigInteger('id_vacaciones')->nullable();
        $table->string('periodo_inicio_laboral', 20)->nullable();
        $table->string('periodo_fin_laboral', 20)->nullable();
        $table->integer('nro_dias_reduccion')->nullable();
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
        Schema::dropIfExists('f_reduccion_vacaciones');
    }
};
