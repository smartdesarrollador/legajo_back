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
        Schema::create('gestion', function (Blueprint $table) {
            $table->id('id_gestion');
        $table->string('gestion', 200)->nullable();
        $table->unsignedBigInteger('id_periodo')->nullable();
        $table->unsignedBigInteger('id_documento')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->unsignedBigInteger('id_empleador')->nullable();
        $table->unsignedBigInteger('id_clase_documento')->nullable();
        $table->date('fecha')->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_periodo')->references('id_periodo')->on('periodo')->onDelete('cascade');
        $table->foreign('id_documento')->references('id_documento')->on('documento')->onDelete('cascade');
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_clase_documento')->references('id_clase_documento')->on('clase_documento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion');
    }
};
