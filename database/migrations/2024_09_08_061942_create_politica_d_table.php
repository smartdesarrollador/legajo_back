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
        Schema::create('politica_d', function (Blueprint $table) {
            $table->id('id_politica');
        $table->integer('secuencia')->nullable();
        $table->string('resumen', 500)->nullable();
        $table->unsignedBigInteger('id_documento')->nullable();
        $table->unsignedBigInteger('id_actividad_denuncia')->nullable();
        $table->boolean('enviar_correo')->nullable();
        $table->boolean('requiere_cargo')->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_politica')->references('id_politica')->on('politica')->onDelete('cascade');
        $table->foreign('id_documento')->references('id_documento')->on('documento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('politica_d');
    }
};
