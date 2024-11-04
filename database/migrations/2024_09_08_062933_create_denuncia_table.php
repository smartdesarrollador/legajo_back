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
        Schema::create('denuncia', function (Blueprint $table) {
            $table->id('id_denuncia');
        $table->unsignedBigInteger('id_tipo_denuncia')->nullable();
        $table->unsignedBigInteger('id_empleador')->nullable();
        $table->unsignedBigInteger('id_trabajador')->nullable();
        $table->unsignedBigInteger('id_estado_denuncia')->nullable();
        $table->date('fecha_denuncia')->nullable();
        $table->date('fecha_cierre')->nullable()->nullable();
        $table->string('numero_documento', 20)->nullable()->nullable();
        $table->timestamps();

        // Foreign keys
        $table->foreign('id_tipo_denuncia')->references('id_tipo_denuncia')->on('tipo_denuncia')->onDelete('cascade');
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_trabajador')->references('id_trabajador')->on('trabajador')->onDelete('cascade');
        $table->foreign('id_estado_denuncia')->references('id_estado_denuncia')->on('estado_denuncia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncia');
    }
};
