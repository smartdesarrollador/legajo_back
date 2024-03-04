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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id("id_trabajador");
            $table->string("trabajador", 250)->nullable();
            $table->string("apellido_paterno", 100)->nullable();
            $table->string("apellido_materno", 100)->nullable();
            $table->string("primer_nombre", 100)->nullable();
            $table->string("segundo_nombre", 100)->nullable();
            /* $table->unsignedBigInteger("id_tipo_documento")->nullable(); */
            /* $table->foreign("id_tipo_documento")->references("id_tipo_documento")->on("tipo_documentos")->onDelete("set null"); */
            $table->string("numero_documento", 100)->nullable();
            $table->date("fecha_nacimiento")->nullable();
            $table->string("ruc", 100)->nullable();
            $table->string("direccion", 100)->nullable();
            $table->string("referencia", 100)->nullable();
            /* $table->unsignedBigInteger("id_ubigeo")->nullable(); */
            /* $table->foreign("id_ubigeo")->references("id_ubigeo")->on("ubigeos")->onDelete("set null"); */
            $table->string("telefono", 100)->nullable();
            $table->string("celular", 100)->nullable();
            $table->string("correo", 100)->nullable();
            $table->unsignedBigInteger("id_empleador")->nullable();
            $table->foreign("id_empleador")->references("id_empleador")->on("empleadores")->onDelete("set null");
            /* $table->unsignedBigInteger("id_regimen_laboral")->nullable(); */
            /* $table->foreign("id_regimen_laboral")->references("id_regimen_laboral")->on("regimen_laborales")->onDelete("set null"); */
            /* $table->unsignedBigInteger("id_ocupacion")->nullable(); */
            /* $table->foreign("id_ocupacion")->references("id_ocupacion")->on("ocupaciones")->onDelete("set null"); */
            $table->unsignedBigInteger("id_tipo_contrato")->nullable();
            $table->foreign("id_tipo_contrato")->references("id_tipo_contrato")->on("tipo_contratos")->onDelete("set null");
            /* $table->unsignedBigInteger("id_jornada_laboral")->nullable(); */
            /*  $table->foreign("id_jornada_laboral")->references("id_jornada_laboral")->on("jornada_laborales")->onDelete("set null"); */
            /* $table->unsignedBigInteger("id_estado_trabajador")->nullable(); */
            /* $table->foreign("id_estado_trabajador")->references("id_estado_trabajador")->on("estado_trabajadores")->onDelete("set null"); */
            $table->date("fecha_estado")->nullable();
            /* $table->unsignedBigInteger("id_nivel_educativo")->nullable(); */
            /* $table->foreign("id_nivel_educativo")->references("id_nivel_educativo")->on("nivel_educativos")->onDelete("set null"); */
            /* $table->unsignedBigInteger("id_regimen_salud")->nullable(); */
            /* $table->foreign("id_regimen_salud")->references("id_regimen_salud")->on("regimen_saluds")->onDelete("set null"); */
            /* $table->unsignedBigInteger("id_regimen_pensiones")->nullable(); */
            /* $table->foreign("id_regimen_pensiones")->references("id_regimen_pensiones")->on("regimen_pensiones")->onDelete("set null"); */
            $table->unsignedBigInteger("id_afp")->nullable();
            $table->foreign("id_afp")->references("id_afp")->on("afps")->onDelete("set null");
            $table->string("cuspp", 100)->nullable();
            $table->string("es_discapacitado", 100)->nullable();
            $table->string("es_sindicalizado", 100)->nullable();
            $table->date("fecha_ingreso")->nullable();
            $table->date("fecha_egreso")->nullable();
            /* $table->unsignedBigInteger("id_motivo_baja")->nullable(); */
            /* $table->foreign("id_motivo_baja")->references("id_motivo_baja")->on("motivo_bajas")->onDelete("set null"); */
            $table->date("fecha_baja")->nullable();
            $table->unsignedBigInteger("id_user")->nullable();
            $table->foreign("id_user")->references("id")->on("users")->onDelete("set null");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadores');
    }
};
