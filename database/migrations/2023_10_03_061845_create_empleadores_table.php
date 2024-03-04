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
        Schema::create('empleadores', function (Blueprint $table) {
            $table->id("id_empleador");
            $table->string("empleador", 100)->nullable();
            $table->string("ruc", 100)->nullable();
            $table->string("domicilio", 100)->nullable();
            $table->string("representante_legal", 200)->nullable();
            $table->string("dni_representante_legal", 200)->nullable();
            $table->string("cargo_representante_legal", 100)->nullable();
            $table->string("numero_partida_poderes", 100)->nullable();
            $table->string("numero_asiento", 100)->nullable();
            $table->string("oficina_registral", 200)->nullable();
            $table->string("numero_partida_registral", 100)->nullable();
            $table->string("fecha_inicio_actividades", 100)->nullable();
            /* $table->unsignedBigInteger("id_ubigeo")->nullable(); */
            /* $table->foreign("id_ubigeo")->references("id_ubigeo")->on("ubigeos")->onDelete("set null"); */
            /* $table->unsignedBigInteger("id_sector")->nullable(); */
            /* $table->foreign("id_sector")->references("id_sector")->on("sectores")->onDelete("set null"); */
            $table->unsignedBigInteger("id_actividad_economica")->nullable();
            $table->foreign("id_actividad_economica")->references("id_actividad_economica")->on("actividades_economicas")->onDelete("set null");
            $table->unsignedBigInteger("id_user")->nullable()->unique();;
            $table->foreign("id_user")->references("id")->on("users")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleadores');
    }
};
