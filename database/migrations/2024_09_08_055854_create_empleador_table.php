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
       Schema::create('empleador', function (Blueprint $table) {
            $table->id('id_empleador');
            $table->string('empleador', 20)->nullable();
            $table->string('ruc', 20)->nullable();
            $table->string('dni_representante_legal')->nullable();
            $table->string('domicilio', 500)->nullable();
            $table->unsignedBigInteger('id_ubigeo')->nullable();
            $table->unsignedBigInteger('id_sector')->nullable();
            $table->unsignedBigInteger('id_actividad_economica')->nullable();
            $table->string('representante_legal', 200)->nullable();
            $table->string('cargo_representante_legal', 200)->nullable();
            $table->string('numero_partida_poderes', 20)->nullable();
            $table->string('numero_asiento', 20)->nullable();
            $table->string('oficina_registral', 200)->nullable();
            $table->string('numero_partida_registral', 50)->nullable();
            $table->date('fecha_inicio_actividades')->nullable();
            $table->unsignedBigInteger("id_user")->nullable()->unique();
            $table->unsignedBigInteger("id_tipo_empleador")->nullable()->unique();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_ubigeo')->references('id_ubigeo')->on('ubigeo')->onDelete('cascade');
            $table->foreign('id_sector')->references('id_sector')->on('sector')->onDelete('cascade');
            $table->foreign('id_actividad_economica')->references('id_actividad_economica')->on('actividades_economicas')->onDelete('cascade');
            
           

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tipo_empleador')->references('id_tipo_empleador')->on('tipo_empleador')->onDelete('cascade');


        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleador');
    }
};
