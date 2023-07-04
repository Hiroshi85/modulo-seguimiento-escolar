<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ApoderadoController;
use App\Http\Controllers\PsicologoController;
use App\Http\Controllers\AuxiliarController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\PruebaPsicologicaController;
use App\Http\Controllers\BuscarController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::resource('alumnos', AlumnoController::class);
    Route::resource('apoderados', ApoderadoController::class);
    Route::resource('psicologos', PsicologoController::class);
    Route::resource('auxiliares', AuxiliarController::class);
    Route::resource('asistencias', AsistenciaController::class);
    Route::resource('pruebas', PruebaPsicologicaController::class);
    Route::get('buscar/asistencias', [BuscarController::class, 'buscarAsistencia'])->name('asist.buscar');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
