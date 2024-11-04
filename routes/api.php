<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__.'/test.php';
require __DIR__.'/user.php';
require __DIR__.'/empleador.php';
require __DIR__.'/trabajador.php';
require __DIR__.'/contrato.php';
require __DIR__.'/permiso.php';


use App\Http\Controllers\AccionController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TipoContratoController;
use App\Http\Controllers\EstadoTrabajadorController;
use App\Http\Controllers\ActividadDenunciaController;
use App\Http\Controllers\ActividadEconomicaController;
use App\Http\Controllers\TipoEmpleadorController;
use App\Http\Controllers\AfpController;
use App\Http\Controllers\AnnoController;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ClaseDocumentoController;
use App\Http\Controllers\ContactoController;

use App\Http\Controllers\CursoController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DenunciaDController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EmpleadorRegimenLaboralController;
use App\Http\Controllers\EstadoAprobacionController;
use App\Http\Controllers\EstadoContratoController;
use App\Http\Controllers\EstadoDenunciaController;
use App\Http\Controllers\EstadoEvaluacionController;
use App\Http\Controllers\EstadoPermisoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FAcumulacionVacacionesController;
use App\Http\Controllers\FuncionesController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\HistoriaDController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\HistorialVacacionesController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\JornadaLaboralController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\MotivoBajaController;
use App\Http\Controllers\NivelEducativoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\OcupacionController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PoliticaDController;
use App\Http\Controllers\PoliticaController;
use App\Http\Controllers\RegimenLaboralController;
use App\Http\Controllers\RegimenPensionesController;
use App\Http\Controllers\RegimenSaludController;
use App\Http\Controllers\SaldoVacacionesController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SeveridadController;
use App\Http\Controllers\SituacionController;
use App\Http\Controllers\TipoArchivoController;
use App\Http\Controllers\TipoContactoController;
use App\Http\Controllers\TipoDenunciaController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\TipoHistoriaController;
use App\Http\Controllers\TipoMovimientoController;
use App\Http\Controllers\TipoPoliticaController;
use App\Http\Controllers\TipoVacacionesController;
use App\Http\Controllers\UbigeoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VacacionesController;
use App\Http\Controllers\Test\ContactController;

use Illuminate\Support\Facades\Mail;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('enviar_correo',[ContactController::class,'sendContactForm']);


Route::apiResource('areas', AreaController::class);
Route::apiResource('tipos_contrato', TipoContratoController::class);
Route::apiResource('estados_trabajador', EstadoTrabajadorController::class);
Route::apiResource('acciones', AccionController::class);
Route::apiResource('actividades-denuncia', ActividadDenunciaController::class);
Route::apiResource('actividades-economicas', ActividadEconomicaController::class);
Route::apiResource('tipos-empleador', TipoEmpleadorController::class);
Route::apiResource('afps', AfpController::class);
Route::apiResource('annos', AnnoController::class);
Route::apiResource('capacitaciones', CapacitacionController::class);
Route::apiResource('cargos', CargoController::class);
Route::apiResource('clase-documentos', ClaseDocumentoController::class);
Route::apiResource('contactos', ContactoController::class);

Route::apiResource('cursos', CursoController::class);
Route::apiResource('deliveries', DeliveryController::class);
Route::apiResource('denunciasd', DenunciaDController::class);
Route::apiResource('denuncias', DenunciaController::class);
Route::apiResource('documentos', DocumentoController::class);
Route::apiResource('empleador-regimenes-laborales', EmpleadorRegimenLaboralController::class);
Route::apiResource('estado-aprobacion', EstadoAprobacionController::class);
Route::apiResource('estados-contrato', EstadoContratoController::class);
Route::apiResource('estados-denuncia', EstadoDenunciaController::class);
Route::apiResource('estados-evaluacion', EstadoEvaluacionController::class);
Route::apiResource('estados-permiso', EstadoPermisoController::class);
Route::apiResource('eventos', EventoController::class);
Route::apiResource('f-acumulacion-vacaciones', FAcumulacionVacacionesController::class);
Route::apiResource('funciones', FuncionesController::class);
Route::apiResource('gestiones', GestionController::class);
Route::apiResource('historiasd', HistoriaDController::class);
Route::apiResource('historias', HistoriaController::class);
Route::apiResource('historial-vacaciones', HistorialVacacionesController::class);
Route::apiResource('instructores', InstructorController::class);
Route::apiResource('jornadas-laborales', JornadaLaboralController::class);
Route::apiResource('licencias', LicenciaController::class);
Route::apiResource('motivos-baja', MotivoBajaController::class);
Route::apiResource('niveles-educativos', NivelEducativoController::class);
Route::apiResource('notificaciones', NotificacionController::class);
Route::apiResource('ocupaciones', OcupacionController::class);
Route::apiResource('periodos', PeriodoController::class);
Route::apiResource('politicasd', PoliticaDController::class);
Route::apiResource('politicas', PoliticaController::class);
Route::apiResource('regimenes-laborales', RegimenLaboralController::class);
Route::apiResource('regimenes-pensiones', RegimenPensionesController::class);
Route::apiResource('regimenes-salud', RegimenSaludController::class);
Route::apiResource('saldos-vacaciones', SaldoVacacionesController::class);
Route::apiResource('sectores', SectorController::class);
Route::apiResource('severidades', SeveridadController::class);
Route::apiResource('situaciones', SituacionController::class);
Route::apiResource('tipos-archivo', TipoArchivoController::class);
Route::apiResource('tipos-contacto', TipoContactoController::class);
Route::apiResource('tipos-denuncia', TipoDenunciaController::class);
Route::apiResource('tipos-documento', TipoDocumentoController::class);
Route::apiResource('tipos-historia', TipoHistoriaController::class);
Route::apiResource('tipos-movimiento', TipoMovimientoController::class);
Route::apiResource('tipos-politica', TipoPoliticaController::class);
Route::apiResource('tipos-vacaciones', TipoVacacionesController::class);
Route::apiResource('ubigeos', UbigeoController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('vacaciones', VacacionesController::class);




