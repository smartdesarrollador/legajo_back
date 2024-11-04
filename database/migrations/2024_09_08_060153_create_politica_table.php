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
        Schema::create('politica', function (Blueprint $table) {
            $table->id('id_politica');
        $table->unsignedBigInteger('id_tipo_politica')->nullable();
        $table->unsignedBigInteger('id_empleador')->nullable();
        $table->string('politica', 500)->nullable();
        $table->string('resumen', 200)->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_tipo_politica')->references('id_tipo_politica')->on('tipo_politica')->onDelete('cascade');
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('politica');
    }
};
