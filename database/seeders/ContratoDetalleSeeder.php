<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContratoDetalleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contrato_detalle')->insert([
            [
                'id_contrato' => 1,
                'oferta_laboral' => 'Desarrollador Full Stack',
                'motivo_contrato' => 'Necesidad de personal especializado',
                'evidencia_documentaria' => 'CV y certificaciones',
                'fecha_suplencia' => '2024-03-15',
                'genero_suplencia' => 'Reemplazo temporal',
                'proyecto_obra_determinada' => 'Sistema de Gestión',
                'ubicacion_obra_determinada' => 'Lima, Perú',
                'objeto_servicio_especifico' => 'Desarrollo de software',
                'nombre_servicio_especifico' => 'Proyecto ERP',
                'locacion_servicio_especifico' => 'Oficina Central',
                'remuneracion' => 5000.00,
                'trabajador_confianza' => true,
                'trabajador_direccion' => false,
                'dia_inicio' => 'Lunes',
                'dia_final' => 'Viernes',
                'horario_inicio' => '09:00:00',
                'horario_final' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_contrato' => 2,
                'oferta_laboral' => 'Analista de Datos',
                'motivo_contrato' => 'Proyecto temporal',
                'evidencia_documentaria' => 'Referencias laborales',
                'fecha_suplencia' => '2024-04-01',
                'genero_suplencia' => 'Proyecto específico',
                'proyecto_obra_determinada' => 'Análisis de mercado',
                'ubicacion_obra_determinada' => 'Arequipa, Perú',
                'objeto_servicio_especifico' => 'Análisis estadístico',
                'nombre_servicio_especifico' => 'Estudio de mercado 2024',
                'locacion_servicio_especifico' => 'Sede Sur',
                'remuneracion' => 4500.00,
                'trabajador_confianza' => true,
                'trabajador_direccion' => false,
                'dia_inicio' => 'Lunes',
                'dia_final' => 'Viernes',
                'horario_inicio' => '08:00:00',
                'horario_final' => '17:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_contrato' => 3,
                'oferta_laboral' => 'Gerente de Proyectos',
                'motivo_contrato' => 'Dirección de nuevo departamento',
                'evidencia_documentaria' => 'Portfolio de proyectos',
                'fecha_suplencia' => '2024-03-20',
                'genero_suplencia' => 'Nuevo puesto',
                'proyecto_obra_determinada' => 'Expansión regional',
                'ubicacion_obra_determinada' => 'Trujillo, Perú',
                'objeto_servicio_especifico' => 'Gestión de proyectos',
                'nombre_servicio_especifico' => 'Expansión Norte',
                'locacion_servicio_especifico' => 'Sede Norte',
                'remuneracion' => 8000.00,
                'trabajador_confianza' => true,
                'trabajador_direccion' => true,
                'dia_inicio' => 'Lunes',
                'dia_final' => 'Sábado',
                'horario_inicio' => '09:00:00',
                'horario_final' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_contrato' => 4,
                'oferta_laboral' => 'Asistente Administrativo',
                'motivo_contrato' => 'Apoyo administrativo',
                'evidencia_documentaria' => 'Certificados laborales',
                'fecha_suplencia' => '2024-04-15',
                'genero_suplencia' => 'Temporal',
                'proyecto_obra_determinada' => 'Gestión documentaria',
                'ubicacion_obra_determinada' => 'Lima, Perú',
                'objeto_servicio_especifico' => 'Soporte administrativo',
                'nombre_servicio_especifico' => 'Gestión 2024',
                'locacion_servicio_especifico' => 'Oficina Central',
                'remuneracion' => 2500.00,
                'trabajador_confianza' => false,
                'trabajador_direccion' => false,
                'dia_inicio' => 'Lunes',
                'dia_final' => 'Viernes',
                'horario_inicio' => '08:00:00',
                'horario_final' => '17:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_contrato' => 5,
                'oferta_laboral' => 'Especialista en Marketing',
                'motivo_contrato' => 'Campaña especial',
                'evidencia_documentaria' => 'Portfolio de campañas',
                'fecha_suplencia' => '2024-05-01',
                'genero_suplencia' => 'Proyecto',
                'proyecto_obra_determinada' => 'Campaña Q2 2024',
                'ubicacion_obra_determinada' => 'Lima, Perú',
                'objeto_servicio_especifico' => 'Marketing digital',
                'nombre_servicio_especifico' => 'Campaña Digital',
                'locacion_servicio_especifico' => 'Oficina Central',
                'remuneracion' => 4000.00,
                'trabajador_confianza' => false,
                'trabajador_direccion' => false,
                'dia_inicio' => 'Lunes',
                'dia_final' => 'Viernes',
                'horario_inicio' => '09:00:00',
                'horario_final' => '18:00:00',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
} 