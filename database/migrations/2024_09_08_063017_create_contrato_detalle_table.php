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
        Schema::create('contrato_detalle', function (Blueprint $table) {
            $table->id('id_contrato_detalle');
            $table->unsignedBigInteger('id_contrato');
            $table->string('oferta_laboral', 500)->nullable();
            $table->string('motivo_contrato', 500)->nullable();
            $table->string('evidencia_documentaria', 500)->nullable();
            $table->date('fecha_suplencia')->nullable();
            $table->string('genero_suplencia', 100)->nullable();
            $table->string('proyecto_obra_determinada', 500)->nullable();
            $table->string('ubicacion_obra_determinada', 500)->nullable();
            $table->string('objeto_servicio_especifico', 500)->nullable();
            $table->string('nombre_servicio_especifico', 500)->nullable();
            $table->string('locacion_servicio_especifico', 500)->nullable();
            $table->string('objeto_contrato_temporada', 500)->nullable();
            $table->string('motivo_contrato_temporada', 500)->nullable();
            $table->string('evidencia_contrato_temporada', 500)->nullable();
            $table->decimal('remuneracion', 10, 2)->nullable();
            $table->boolean('trabajador_confianza')->default(false);
            $table->boolean('trabajador_direccion')->default(false);
            $table->boolean('pregunta_1')->default(false);
            $table->boolean('pregunta_2')->default(false);
            $table->boolean('pregunta_3')->default(false);
            $table->boolean('fiscalizacion_inmediata')->default(false);
            $table->boolean('jornada_maxima')->default(false);
            $table->string('dia_inicio', 50)->nullable();
            $table->string('dia_final', 50)->nullable();
            $table->time('horario_inicio')->nullable();
            $table->time('horario_final')->nullable();
            $table->boolean('prevencion_covid')->default(false);
            $table->boolean('obligaciones_compromisos')->default(false);
            $table->boolean('confidencialidad')->default(false);
            $table->boolean('propiedad_intelectual')->default(false);
            $table->boolean('tecnologia_informacion')->default(false);
            $table->boolean('exclusividad')->default(false);
            $table->boolean('proteccion_datos')->default(false);
            $table->timestamps();

            $table->foreign('id_contrato')
                  ->references('id_contrato')
                  ->on('contrato')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrato_detalle');
    }
}; 