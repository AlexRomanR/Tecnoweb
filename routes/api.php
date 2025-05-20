<?php

use App\Http\Controllers\api\AsistenciasController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\EntrevistaController;
use App\Http\Controllers\api\EmpleadoController;
use App\Http\Controllers\api\LlamadaController;
use App\Http\Controllers\api\MensajesController;
use App\Http\Controllers\api\NotificacionesController;
use App\Http\Controllers\api\PostulanteController;
use App\Http\Controllers\api\PuestosController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas de autenticación
Route::post('/sanctum/token', [AuthController::class, 'generateToken']);
Route::post('/user/revoke', [AuthController::class, 'revokeToken']);

Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return 'Tokens Eliminados';
});
Route::post('/register', [AuthController::class, 'register']);

// Rutas para la gestión de permisos
Route::post('/permisos/enviar-solicitud', [PermisoController::class, 'enviarSolicitud']);
Route::get('/permisos/historial', [PermisoController::class, 'historial']);
Route::put('/permisos/aprobar/{id}', [PermisoController::class, 'approve']);
Route::put('/permisos/denegar/{id}', [PermisoController::class, 'deny']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = User::find($request->user()->id);
    $user->foto = $user->Postulante
        ? $request->user()->postulante->ruta_imagen_e
        : $request->user()->empleado->ruta_imagen_e;
    $user->cargo = $user->Postulante
        ? 'Postulante'
        : ($request->user()->empleado->cargo->nombre);
    $user->departamento = $user->Postulante
        ? 'Postulante'
        : ($request->user()->empleado->departamento->nombre);
    return $user;
});
Route::get('/postulante/{id}', [PostulanteController::class, 'getPostulante']);
Route::get('/getRol/{id}/{rol}', [AuthController::class, 'getRol']);
Route::get('/getPermission/{id}/{permiso}', [AuthController::class, 'getPermission']);
Route::get('/contrato/{id}', [PostulanteController::class, 'getContrato']);
Route::get('/postulante/educaciones/{id}', [PostulanteController::class, 'getEducaciones']);
Route::get('/postulante/reconocimientos/{id}', [PostulanteController::class, 'getReconocimientos']);
Route::get('/postulante/experiencias/{id}', [PostulanteController::class, 'getExperiencias']);
Route::get('/postulante/referencias/{id}', [PostulanteController::class, 'getReferencias']);

Route::get('/entrevista/{id}', [EntrevistaController::class, 'getEntrevista']);
Route::get('/postulante/contrato/{id}', [EntrevistaController::class, 'getContrato']);
Route::get('/empleado/llamada/{id}', [LlamadaController::class, 'getLlamadas']);

Route::get('/mensaje/nuevos/{id}', [MensajesController::class, 'inicio']);
Route::post('/mensaje/enviar/{id}', [MensajesController::class, 'enviar']);
Route::get('/mensaje/mostrar/{usuario_id}/{otro_id}', [MensajesController::class, 'mostrar']);
Route::get('/mensaje/usuarios/{id}', [MensajesController::class, 'usuarios']);

Route::post('/postulante/actualizarinfo/{id}', [PostulanteController::class, 'actualizar']);


//Educaciones
Route::post('/postulante/educacion/{id}', [PostulanteController::class, 'guardarEducacion']);
Route::post('/postulante/actualizarEducacion/{id}', [PostulanteController::class, 'actualizarEducacion']);
Route::delete('/educacionEliminar/{id}', [PostulanteController::class, 'eliminarEducacion']);


//Reconocimientos
Route::post('/postulante/reconocimiento/{id}', [PostulanteController::class, 'guardarReconocimiento']);
Route::post('/postulante/actualizarReconocimiento/{id}', [PostulanteController::class, 'actualizarReconocimiento']);
Route::delete('/reconocimientoEliminar/{id}', [PostulanteController::class, 'eliminarReconocimiento']);


//Experiencias
Route::post('/postulante/experiencia/{id}', [PostulanteController::class, 'guardarExperiencia']);
Route::post('/postulante/actualizarExperiencia/{id}', [PostulanteController::class, 'actualizarExperiencia']);
Route::delete('/experienciaEliminar/{id}', [PostulanteController::class, 'eliminarExperiencia']);


//referencias
Route::post('/postulante/referencia/{id}', [PostulanteController::class, 'guardarReferencia']);
Route::post('/postulante/actualizarReferencia/{id}', [PostulanteController::class, 'actualizarReferencia']);
Route::delete('/referenciaEliminar/{id}', [PostulanteController::class, 'eliminarReferencia']);



//para los desplegables
Route::get('/postulantes/idiomas', [PostulanteController::class, 'getIdiomas']);
Route::get('/postulantes/nivelIdiomas', [PostulanteController::class, 'getNivelIdiomas']);
Route::get('/postulantes/fuenteDeContratacion', [PostulanteController::class, 'getFuenteDeContratacion']);
Route::get('/postulantes/puestoDisponible', [PostulanteController::class, 'getPuestoDisponible']);




Route::get('/empleado/horario/{idEmpleado}', [AsistenciasController::class, 'getHorario']);
Route::get('/empleado/marcar/{idEmpleado}', [AsistenciasController::class, 'marcar']);
Route::get('/empleado/guardarAsistencia/{idEmpleado}/{idDiaTrabajo}', [AsistenciasController::class, 'guardarAsistencias']);
Route::get('/empleado/guardarAsistenciaAuto/', [AsistenciasController::class, 'verificarFaltasAutomaticas']);

Route::get('/notificacion/getnotificaciones/{id}', [NotificacionesController::class, 'getNotificaciones']);
Route::post('/notificacion/marcartodas/{id}', [NotificacionesController::class, 'marcarTodasComoLeidas']);
Route::post('/notificacion/marcar/{id_user}/{id_noti}', [NotificacionesController::class, 'marcarComoLeida']);

Route::get('/puestos/getpuestos', [PuestosController::class, 'getPuestos']);
Route::post('/puestos/postularse/{id_user}/{idpuesto}', [PuestosController::class, 'postularse']);

//empleado permisos
Route::get('/empleado/getPermisosEmpleado/{idEmpleado}', [EmpleadoController::class, 'getPermisosEmpleado']);
Route::post('/empleado/guardarPermiso/{idPermiso}', [EmpleadoController::class, 'guardarPermiso']);
Route::post('/empleado/actualizarPermiso/{idPermiso}', [EmpleadoController::class, 'actualizarPermiso']);
Route::delete('/empleado/eliminarPermiso/{idPermiso}', [EmpleadoController::class, 'eliminarPermiso']);
