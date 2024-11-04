<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/* use App\Models\ActividadEconomica;
use App\Models\EstadoContrato; */
use Illuminate\Database\Seeder;
use Illuminate\Notifications\Notification;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /* \App\Models\Accion::factory(7)->create();
        \App\Models\ActividadDenuncia::factory(7)->create();
        \App\Models\ActividadEconomica::factory(5)->create();
        \App\Models\Anno::factory(7)->create();
        \App\Models\Empleador::factory(7)->create();
        \App\Models\Modalidad::factory(7)->create();
        \App\Models\Afp::factory(7)->create();
        \App\Models\EstadoContrato::factory(7)->create();
        \App\Models\TipoContrato::factory(7)->create();
        \App\Models\Trabajador::factory(7)->create();
        \App\Models\Documento::factory(7)->create();
        \App\Models\Contrato::factory(7)->create(); */

        $this->call([
            UserSeeder::class,
            RolesSeeder::class,
            PermissionSeeder::class,
            PermissionRolSeeder::class,
            RolUserSeeder::class,
            UbigeoSeeder::class,
            TipoEmpleadorSeeder::class,
            TipoHistoriaSeeder::class,
            ActividadDenunciaSeeder::class,
            AccionSeeder::class,
            SeveridadSeeder::class,
            EventoSeeder::class,
            TipoDocumentoSeeder::class,
            RegimenLaboralSeeder::class,
            SituacionSeeder::class,
            CursoSeeder::class,
            EstadoEvaluacionSeeder::class,
            InstructorSeeder::class,
            TipoDenunciaSeeder::class,
            TipoVacacionesSeeder::class,
            TipoMovimientoSeeder::class,
            ActividadEconomicaSeeder::class,
            NivelEducativoSeeder::class,
            EstadoDenunciaSeeder::class,
            EstadoContratoSeeder::class,
            FuncionesSeeder::class,
            NotificacionSeeder::class,
            EstadoPermisoSeeder::class,
            RegimenSaludSeeder::class,
            RegimenPensionesSeeder::class,
            AfpSeeder::class,
            OcupacionSeeder::class,
            TipoContratoSeeder::class,
            JornadaLaboralSeeder::class,
            EstadoTrabajadorSeeder::class,
            MotivoBajaSeeder::class,
            SectorSeeder::class,
            TipoContactoSeeder::class,
            AreaSeeder::class,
            PeriodoSeeder::class,
            AnnoSeeder::class,
            FeriadoSeeder::class,
            CargoSeeder::class,
            TipoPoliticaSeeder::class,
            ClaseDocumentoSeeder::class,
            TipoArchivoSeeder::class,
            UsuarioSeeder::class,
            EmpleadorSeeder::class,
            TrabajadorSeeder::class,
            DocumentoSeeder::class,
            PoliticaSeeder::class,
            PoliticaDSeeder::class,
            GestionSeeder::class,
            EmpleadorRegimenLaboralSeeder::class,
            ContactoSeeder::class,
            HistoriaSeeder::class,
            HistoriaDSeeder::class,
            CapacitacionSeeder::class,
            DenunciaSeeder::class,
            DenunciaDSeeder::class,
            ContratoSeeder::class,
            DeliverySeeder::class,
            PermisoSeeder::class,
            LicenciaSeeder::class,
            VacacionesSeeder::class,
            EstadoAprobacionSeeder::class,
            HistorialVacacionesSeeder::class,
            SaldoVacacionesSeeder::class,
            FAcumulacionVacacionesSeeder::class,
            FReduccionVacacionesSeeder::class,
            FAdelantoVacacionesSeeder::class,
           
        ]);
    }
}
