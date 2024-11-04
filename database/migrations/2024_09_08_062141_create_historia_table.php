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
        Schema::create('historia', function (Blueprint $table) {
            $table->id('id_historia');
        $table->unsignedBigInteger('id_empleador')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->unsignedBigInteger('id_tipo_historia')->nullable();
        $table->unsignedBigInteger('id_evento')->nullable();
        $table->unsignedBigInteger('id_accion')->nullable();
        $table->unsignedBigInteger('id_severidad')->nullable();
        $table->date('fecha_inicio')->nullable();
        $table->date('fecha_fin')->nullable()->nullable();
        $table->string('observacion', 500)->nullable()->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historia');
    }
};
