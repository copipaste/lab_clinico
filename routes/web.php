<?php

use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoSeguroController;
use App\Http\Controllers\TipoAnalisisController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\BioquimicoController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\HemogramaCompletoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\HormonasController;
use App\Models\HemogramaCompleto;
use App\Http\Controllers\NotificationsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function (){
    return view('welcome');
});
*/

Auth::routes();
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function (){
        return redirect()->route('users.index');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/tiposeguro', TipoSeguroController::class)->names('tiposeguro');


    Route::get('tipoanalisis',[TipoAnalisisController::class, 'index'])->name('tipoanalisis.index');
    Route::post('tipoanalisis', [TipoAnalisisController::class, 'store'])->name('tipoanalisis.store');
    Route::get('tipoanalisis/{tipoanalisis}', [TipoAnalisisController::class, 'edit'])->name('tipoanalisis.edit');
    Route::put('tipoanalisis/{tipoanalisis}', [TipoAnalisisController::class, 'update'])->name('tipoanalisis.update');
    Route::delete('tipoanalisis/{tipoanalisis}', [TipoAnalisisController::class, 'destroy'])->name('tipoanalisis.destroy');
    //Rutas Usuario
    Route::resource('/users', UserController::class)->names('users');
    //Rutas Roles
    Route::resource('/roles', RoleController::class)->names('roles');
    //Rutas Pacientes
    Route::resource('/pacientes', PacienteController::class)->names('pacientes');
    //Rutas Historiales
    Route::resource('/historiales', HistorialController::class)->names('historiales');


    //ruta bioquimicos
    //Rutas Pacientes
    Route::resource('/bioquimicos', BioquimicoController::class)->names('bioquimicos');

    //analisis

    // Route::resource('/analisis', AnalisisController::class)->names('analisis');
    Route::get('analisis',[AnalisisController::class, 'index'])->name('analisis.index');
    Route::post('analisis', [AnalisisController::class, 'store'])->name('analisis.store');
    Route::delete('analisis/{analisis}', [AnalisisController::class, 'destroy'])->name('analisis.destroy');
    Route::get('/analisis/{id}/hemograma', [AnalisisController::class, 'hemograma'])->name('analisis.hemograma');
    Route::post('/analisis/hemograma', [AnalisisController::class, 'hemogramaStore'])->name('analisis.hemogramastore');
    Route::get('/analisis/{id}/hormona', [AnalisisController::class, 'hormona'])->name('analisis.hormona');

    Route::get('Bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');
    Route::post('/analisis/hormona', [AnalisisController::class, 'hormonaStore'])->name('analisis.hormonastore');

    //orden
    Route::resource('/orden', OrdenController::class)->names('orden');

    // Route::resource('/hemograma', HemogramaCompletoController::class)->names('hemograma');
    //hormona
    Route::get('hormonaCompleto/{id}',[HormonasController::class, 'show2'])->name('hormona.show2');
    Route::resource('/hormona', HormonasController::class)->names('hormona');
    Route::get('hemogramaCompleto/{id}',[HemogramaCompletoController::class, 'show2'])->name('hemograma.show2');
    Route::resource('/hemograma', HemogramaCompletoController::class)->names('hemograma');


});


    /* ------------------------------------- VISTA ESPECIALIDADES ----------------------------------------------------------- */
Route::resource('/VistaEspecialidades', EspecialidadController::class)->names('especialidad');
/* ---------------------------------------------------------------------------------------------------------------------- */

/* ------------------------------------- VISTA ESPECIALIDADES ---------------------------------------------------------- */
Route::resource('/VistaRecepcionistas', RecepcionistaController::class)->names('recepcionistas');
/* ---------------------------------------------------------------------------------------------------------------------- */




// rutas landing page
Route::get('/landingpage',[LandingPageController::class, 'index'])->name('LandingPage.index');
Route::get('/landingpage/solicitud',[LandingPageController::class, 'solicitud'])->name('LandingPage.solicitud');
Route::get('/landingpage/comentarios',[LandingPageController::class, 'comentarios'])->name('LandingPage.comentarios');
Route::get('landingpage/aboutUs', [LandingPageController::class, 'aboutUs'])->name('LandingPage.aboutUs');
Route::get('landingpage/contactUs', [LandingPageController::class, 'contactUs'])->name('LandingPage.contactUs');
Route::delete('/landingpage/comentarios/{comentario}', [LandingPageController::class, 'destroy'])->name('LandingPage.comentarios.destroy');
Route::post('/landingpage/comentarios', [LandingPageController::class, 'store'])->name('LandingPage.comentarios.store');



// rutas notificaciones

Route::get('notifications/get',[NotificationsController::class, 'getNotificationsData'])->name('notifications.get');