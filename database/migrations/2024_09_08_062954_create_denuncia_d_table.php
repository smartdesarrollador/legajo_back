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
        Schema::create('denuncia_d', function (Blueprint $table) {
            $table->id('id_denuncia');
        $table->unsignedBigInteger('id_actividad_denuncia')->nullable();
        $table->unsignedBigInteger('id_documento')->nullable();
        $table->string('detalle_denuncia', 500)->nullable();
        $table->integer('secuencia')->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_denuncia')->references('id_denuncia')->on('denuncia')->onDelete('cascade');
        $table->foreign('id_documento')->references('id_documento')->on('documento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncia_d');
    }
};
