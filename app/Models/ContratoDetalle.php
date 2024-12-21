<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContratoDetalle extends Model
{
    protected $table = 'contrato_detalle';
    protected $primaryKey = 'id_contrato_detalle';

    protected $fillable = [
        'id_contrato',
        'oferta_laboral',
        'motivo_contrato',
        'evidencia_documentaria',
        'fecha_suplencia',
        'genero_suplencia',
        'proyecto_obra_determinada',
        'ubicacion_obra_determinada',
        'objeto_servicio_especifico',
        'nombre_servicio_especifico',
        'locacion_servicio_especifico',
        'objeto_contrato_temporada',
        'motivo_contrato_temporada',
        'evidencia_contrato_temporada',
        'remuneracion',
        'trabajador_confianza',
        'trabajador_direccion',
        'pregunta_1',
        'pregunta_2',
        'pregunta_3',
        'fiscalizacion_inmediata',
        'jornada_maxima',
        'dia_inicio',
        'dia_final',
        'horario_inicio',
        'horario_final',
        'prevencion_covid',
        'obligaciones_compromisos',
        'confidencialidad',
        'propiedad_intelectual',
        'tecnologia_informacion',
        'exclusividad',
        'proteccion_datos'
    ];

    protected $casts = [
        'fecha_suplencia' => 'date',
        'horario_inicio' => 'datetime:H:i',
        'horario_final' => 'datetime:H:i',
        'remuneracion' => 'decimal:2',
        'trabajador_confianza' => 'boolean',
        'trabajador_direccion' => 'boolean',
        'pregunta_1' => 'boolean',
        'pregunta_2' => 'boolean',
        'pregunta_3' => 'boolean',
        'fiscalizacion_inmediata' => 'boolean',
        'jornada_maxima' => 'boolean',
        'prevencion_covid' => 'boolean',
        'obligaciones_compromisos' => 'boolean',
        'confidencialidad' => 'boolean',
        'propiedad_intelectual' => 'boolean',
        'tecnologia_informacion' => 'boolean',
        'exclusividad' => 'boolean',
        'proteccion_datos' => 'boolean'
    ];

    /**
     * Obtiene el contrato asociado al detalle
     */
    public function contrato()
    {
        return $this->belongsTo(Contrato::class, 'id_contrato', 'id_contrato');
    }

    /**
     * Obtiene el trabajador a través de la relación con contrato
     */
    public function trabajador()
    {
        return $this->hasOneThrough(
            Trabajador::class,
            Contrato::class,
            'id_contrato', // Llave foránea en contrato_detalle
            'id_trabajador', // Llave primaria en trabajador
            'id_contrato', // Llave local en contrato_detalle
            'id_trabajador' // Llave foránea en contrato
        );
    }

    /**
     * Obtiene el empleador a través de la relación con contrato
     */
    public function empleador()
    {
        return $this->hasOneThrough(
            Empleador::class,
            Contrato::class,
            'id_contrato', // Llave foránea en contrato_detalle
            'id_empleador', // Llave primaria en empleador
            'id_contrato', // Llave local en contrato_detalle
            'id_empleador' // Llave foránea en contrato
        );
    }
} 