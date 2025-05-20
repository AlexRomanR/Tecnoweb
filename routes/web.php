<?php

use App\Exports\EmpleadoPersonalizadoExport;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\EducacionController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\DetalleBitacoraController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EntrevistaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\InformacionPersonalController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Puesto_DisponibleController;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\Pre_ContratoController;
use App\Http\Controllers\ReconocimientoController;
use App\Http\Controllers\ReferenciaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\DepositoController;

use App\Http\Controllers\Llamada_De_AtencionController;

use App\Http\Controllers\SueldoController;

use App\Http\Controllers\MemorandumController;
use App\Models\Educacion;
use App\Models\Postulante;
use App\Models\Reconocimiento;
use App\Models\Departamento;
use App\Models\Puesto_Disponible;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/time', function () {
    return now();
});

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard/{opcional?}', function ($opcional = null) {
        return view('dashboard', compact('opcional'));
    })->name('dashboard');


    //ROLES

    Route::get('/roles/inicio', [RoleController::class, 'inicio'])->name('roles.inicio');
    Route::get('/roles/crear', [RoleController::class, 'crear'])->name('roles.crear');
    Route::post('/roles/guardar', [RoleController::class, 'guardar'])->name('roles.guardar');
    Route::get('/roles/editar/{id}', [RoleController::class, 'editar'])->name('roles.editar');
    Route::post('/roles/actualizar/{id}', [RoleController::class, 'actualizar'])->name('roles.actualizar');
    Route::post('/roles/eliminar/{id}', [RoleController::class, 'eliminar'])->name('roles.eliminar');


    Route::get('/completado', function () {
        return view('Contratacion.completado');
    })->name('completado');



    //Bitacora
    Route::get('/bitacoras/inicio/{id}', [BitacoraController::class, 'inicio'])->name('bitacoras.inicio');
    Route::get('/bitacoras/rinicio', [BitacoraController::class, 'rinicio'])->name('bitacoras.rinicio');
    Route::get('/bitacoras/PDF', [BitacoraController::class, 'generarBitacoraPDF'])->name('generarBitacoraPDF');
    Route::get('/bitacoras/PDF/{id}', [BitacoraController::class, 'generarBitacoraPDF_usuario'])->name('generarBitacoraPDF_usuario');

    //DetalleBitacora
    Route::get('/detbitacoras/inicio/{id}', [DetalleBitacoraController::class, 'inicio'])->name('detbitacoras.inicio');
    Route::get('/detbitacoras/PDF/{id}', [DetalleBitacoraController::class, 'generarDetalleBitacoraPDF'])->name('generarDetalleBitacoraPDF');

    //Reportes
    Route::get('/reportes/inicio', [ReporteController::class, 'inicio'])->name('reportes.inicio');
    Route::post('/reportes/empleados/personalizado', [ReporteController::class, 'reporteempleadopersonalizado'])->name('reportes.empleado');
    Route::post('/reportes/departamentos/empleados/personalizado', [ReporteController::class, 'reportedepartamentoempleadopersonalizado'])->name('reportes.departamento.empleado');
    Route::post('/reportes/postulantes/personalizado', [ReporteController::class, 'reportepostulantepersonalizado'])->name('reportes.postulante');
    Route::get('/reportes/postulantes/excel', [ReporteController::class, 'excelpostulante'])->name('excelpostulante');
    Route::get('/reportes/postulantes/csv', [ReporteController::class, 'csvpostulante'])->name('csvpostulante');
    Route::get('/reportes/postulantes/pdf', [ReporteController::class, 'pdfpostulante'])->name('pdfpostulante');
    Route::get('/reportes/postulantes/html', [ReporteController::class, 'htmlpostulante'])->name('htmlpostulante');
    Route::get('/reportes/empleados/excel', [ReporteController::class, 'excelempleado'])->name('excelempleado');
    Route::get('/reportes/empleados/csv', [ReporteController::class, 'csvempleado'])->name('csvempleado');
    Route::get('/reportes/empleados/pdf', [ReporteController::class, 'pdfempleado'])->name('pdfempleado');
    Route::get('/reportes/empleados/html', [ReporteController::class, 'htmlempleado'])->name('htmlempleado');


    //Bitacora
    Route::get('/bitacoras/inicio/{id}', [BitacoraController::class, 'inicio'])->name('bitacoras.inicio');
    Route::get('/bitacoras/rinicio', [BitacoraController::class, 'rinicio'])->name('bitacoras.rinicio');
    Route::get('/bitacoras/PDF', [BitacoraController::class, 'generarBitacoraPDF'])->name('generarBitacoraPDF');
    Route::get('/bitacoras/PDF/{id}', [BitacoraController::class, 'generarBitacoraPDF_usuario'])->name('generarBitacoraPDF_usuario');

    //DetalleBitacora
    Route::get('/detbitacoras/inicio/{id}', [DetalleBitacoraController::class, 'inicio'])->name('detbitacoras.inicio');
    Route::get('/detbitacoras/PDF/{id}', [DetalleBitacoraController::class, 'generarDetalleBitacoraPDF'])->name('generarDetalleBitacoraPDF');

    //Reportes
    Route::get('/reportes/inicio', [ReporteController::class, 'inicio'])->name('reportes.inicio');
    Route::post('/reportes/empleados/personalizado', [ReporteController::class, 'reporteempleadopersonalizado'])->name('reportes.empleado');
    Route::post('/reportes/departamentos/empleados/personalizado', [ReporteController::class, 'reportedepartamentoempleadopersonalizado'])->name('reportes.departamento.empleado');
    Route::post('/reportes/postulantes/personalizado', [ReporteController::class, 'reportepostulantepersonalizado'])->name('reportes.postulante');
    Route::get('/reportes/postulantes/excel', [ReporteController::class, 'excelpostulante'])->name('excelpostulante');
    Route::get('/reportes/postulantes/csv', [ReporteController::class, 'csvpostulante'])->name('csvpostulante');
    Route::get('/reportes/postulantes/pdf', [ReporteController::class, 'pdfpostulante'])->name('pdfpostulante');
    Route::get('/reportes/postulantes/html', [ReporteController::class, 'htmlpostulante'])->name('htmlpostulante');
    Route::get('/reportes/empleados/excel', [ReporteController::class, 'excelempleado'])->name('excelempleado');
    Route::get('/reportes/empleados/csv', [ReporteController::class, 'csvempleado'])->name('csvempleado');
    Route::get('/reportes/empleados/pdf', [ReporteController::class, 'pdfempleado'])->name('pdfempleado');
    Route::get('/reportes/empleados/html', [ReporteController::class, 'htmlempleado'])->name('htmlempleado');

    //Bitacora
    Route::get('/bitacoras/inicio/{id}', [BitacoraController::class, 'inicio'])->name('bitacoras.inicio');
    Route::get('/bitacoras/rinicio', [BitacoraController::class, 'rinicio'])->name('bitacoras.rinicio');
    Route::get('/bitacoras/PDF', [BitacoraController::class, 'generarBitacoraPDF'])->name('generarBitacoraPDF');
    Route::get('/bitacoras/PDF/{id}', [BitacoraController::class, 'generarBitacoraPDF_usuario'])->name('generarBitacoraPDF_usuario');

    //DetalleBitacora
    Route::get('/detbitacoras/inicio/{id}', [DetalleBitacoraController::class, 'inicio'])->name('detbitacoras.inicio');
    Route::get('/detbitacoras/PDF/{id}', [DetalleBitacoraController::class, 'generarDetalleBitacoraPDF'])->name('generarDetalleBitacoraPDF');

    //Reportes
    Route::get('/reportes/inicio', [ReporteController::class, 'inicio'])->name('reportes.inicio');
    Route::post('/reportes/empleados/personalizado', [ReporteController::class, 'reporteempleadopersonalizado'])->name('reportes.empleado');
    Route::post('/reportes/departamentos/empleados/personalizado', [ReporteController::class, 'reportedepartamentoempleadopersonalizado'])->name('reportes.departamento.empleado');
    Route::post('/reportes/postulantes/personalizado', [ReporteController::class, 'reportepostulantepersonalizado'])->name('reportes.postulante');
    Route::get('/reportes/postulantes/excel', [ReporteController::class, 'excelpostulante'])->name('excelpostulante');
    Route::get('/reportes/postulantes/csv', [ReporteController::class, 'csvpostulante'])->name('csvpostulante');
    Route::get('/reportes/postulantes/pdf', [ReporteController::class, 'pdfpostulante'])->name('pdfpostulante');
    Route::get('/reportes/postulantes/html', [ReporteController::class, 'htmlpostulante'])->name('htmlpostulante');
    Route::get('/reportes/empleados/excel', [ReporteController::class, 'excelempleado'])->name('excelempleado');
    Route::get('/reportes/empleados/csv', [ReporteController::class, 'csvempleado'])->name('csvempleado');
    Route::get('/reportes/empleados/pdf', [ReporteController::class, 'pdfempleado'])->name('pdfempleado');
    Route::get('/reportes/empleados/html', [ReporteController::class, 'htmlempleado'])->name('htmlempleado');



});
