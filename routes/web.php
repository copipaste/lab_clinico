<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipoSeguroController;

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

Route::get('/', function (){
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('tiposeguro',[TipoSeguroController::class, 'index'])->name('tiposeguro.index');
    Route::post('tiposeguro', [TipoSeguroController::class, 'store'])->name('tiposeguro.store');
    Route::get('tiposeguro/{tiposeguro}', [TipoSeguroController::class, 'edit'])->name('tiposeguro.edit');
    Route::put('tiposeguro/{tiposeguro}', [TipoSeguroController::class, 'update'])->name('tiposeguro.update');
    Route::delete('tiposeguro/{tiposeguro}', [TipoSeguroController::class, 'destroy'])->name('tiposeguro.destroy');

});

Route::get('/landingpage', function () {
    return view('landingpage');
});


