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
        Schema::create('trabajador', function (Blueprint $table) {
            $table->id('id_trabajador');
        $table->string('paterno', 500)->nullable();
        $table->string('materno', 500)->nullable();
        $table->string('primer', 500)->nullable();
        $table->string('segundo', 500)->nullable();
        $table->unsignedBigInteger('id_tipo_documento')->nullable();
        $table->string('numero_documento', 50)->nullable();
        $table->date('fecha_nacimiento')->nullable();
        $table->string('ruc')->nullable();
        $table->string('direccion', 1000);
        $table->string('referencia', 500)->nullable();
        $table->unsignedBigInteger('id_ubigeo');
        $table->string('telefono', 20)->nullable();
        $table->string('celular', 20)->nullable();
        $table->string('correo', 500)->nullable();
        $table->unsignedBigInteger('id_empleador');
        $table->unsignedBigInteger('id_regimen_laboral')->nullable();
        $table->unsignedBigInteger('id_ocupacion')->nullable();
        $table->unsignedBigInteger('id_tipo_contrato')->nullable();
        $table->unsignedBigInteger('id_cargo')->nullable();
        $table->unsignedBigInteger('id_area')->nullable();
        $table->boolean('es_jefe')->nullable()->nullable();
        $table->unsignedBigInteger('id_jornada_laboral')->nullable();
        $table->unsignedBigInteger('id_estado_trabajador')->nullable();
        $table->date('fecha_estado')->nullable();
        $table->unsignedBigInteger('id_nivel_educativo')->nullable();
        $table->unsignedBigInteger('id_regimen_salud')->nullable();
        $table->unsignedBigInteger('id_regimen_pensiones')->nullable();
        $table->unsignedBigInteger('id_afp')->nullable();
        $table->string('cuspp', 100)->nullable();
        $table->boolean('es_discapacitado')->nullable();
        $table->boolean('es_sindicalizado')->nullable();
        $table->date('fecha_ingreso')->nullable();
        $table->date('fecha_egreso')->nullable();
        $table->unsignedBigInteger('id_motivo_baja')->nullable();
        $table->date('fecha_baja')->nullable();
        $table->unsignedBigInteger('id_contrato')->nullable();
        $table->boolean('aprueba_solicitudes')->nullable();
        $table->decimal('saldo_inicial_vacaciones', 8, 2)->nullable();
        $table->unsignedBigInteger("id_user")->nullable();
        $table->timestamps();

        
    

        // Foreign keys
        $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documento')->onDelete('cascade');
        $table->foreign('id_ubigeo')->references('id_ubigeo')->on('ubigeo')->onDelete('cascade');
        $table->foreign('id_empleador')->references('id_empleador')->on('empleador')->onDelete('cascade');
        $table->foreign('id_regimen_laboral')->references('id_regimen_laboral')->on('regimen_laboral')->onDelete('cascade');
        $table->foreign('id_ocupacion')->references('id_ocupacion')->on('ocupacion')->onDelete('cascade');
        $table->foreign('id_tipo_contrato')->references('id_tipo_contrato')->on('tipo_contrato')->onDelete('cascade');
        $table->foreign('id_cargo')->references('id_cargo')->on('cargo')->onDelete('cascade');
        $table->foreign('id_area')->references('id_area')->on('area')->onDelete('cascade');
        $table->foreign('id_jornada_laboral')->references('id_jornada_laboral')->on('jornada_laboral')->onDelete('cascade');
        $table->foreign('id_estado_trabajador')->references('id_estado_trabajador')->on('estado_trabajador')->onDelete('cascade');
        $table->foreign('id_nivel_educativo')->references('id_nivel_educativo')->on('nivel_educativo')->onDelete('cascade');
        $table->foreign('id_regimen_salud')->references('id_regimen_salud')->on('regimen_salud')->onDelete('cascade');
        $table->foreign('id_regimen_pensiones')->references('id_regimen_pensiones')->on('regimen_pensiones')->onDelete('cascade');
        $table->foreign('id_afp')->references('id_afp')->on('afp')->onDelete('cascade');
        $table->foreign('id_motivo_baja')->references('id_motivo_baja')->on('motivo_baja')->onDelete('cascade');
            $table->foreign("id_user")->references("id")->on("users")->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajador');
    }
};
