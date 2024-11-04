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
        Schema::create('contacto', function (Blueprint $table) {
            $table->id('id_contacto');
        $table->string('contacto', 200)->nullable();
        $table->unsignedBigInteger('id_empleador')->nullable();
        $table->unsignedBigInteger('id_tipo_contacto')->nullable();
        $table->unsignedBigInteger('id_area')->nullable();
        $table->string('telefono', 20)->nullable();
        $table->string('celular', 20)->nullable();
        $table->string('correo', 500)->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_tipo_contacto')->references('id_tipo_contacto')->on('tipo_contacto')->onDelete('cascade');
        $table->foreign('id_area')->references('id_area')->on('area')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto');
    }
};
