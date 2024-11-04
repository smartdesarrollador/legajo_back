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
        Schema::create('estado_aprobacion', function (Blueprint $table) {
            $table->id('id_estado_aprobacion');
        $table->string('estado_aprobacion', 200)->nullable();
        $table->unsignedBigInteger('id_vacaciones')->nullable();
        $table->string('aprobado_por', 200)->nullable();
        $table->string('cargo', 200)->nullable();
        $table->date('fecha_aprobacion')->nullable();
        $table->string('comentario', 500)->nullable()->nullable();
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
        Schema::dropIfExists('estado_aprobacion');
    }
};
