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
        Schema::create('delivery', function (Blueprint $table) {
            $table->id('id_delivery');
        $table->unsignedBigInteger('id_empleador')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->unsignedBigInteger('id_documento')->nullable();
        $table->unsignedBigInteger('id_notificacion')->nullable();
        $table->date('fecha_confirmacion')->nullable();
        $table->boolean('confirmacion')->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        $table->foreign('id_documento')->references('id_documento')->on('documento')->onDelete('cascade');
        $table->foreign('id_notificacion')->references('id_notificacion')->on('notificacion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery');
    }
};
