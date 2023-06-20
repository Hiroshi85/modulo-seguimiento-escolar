<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ApoderadoController;
use App\Http\Controllers\PsicologoController;
use App\Http\Controllers\AuxiliarController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\PruebaPsicologicaController;
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

Route::prefix('dashboard')->middleware(['auth'])->group(function(){
    Route::resource('alumno', AlumnoController::class);
    Route::resource('apoderado', ApoderadoController::class);
    Route::resource('psicologo', PsicologoController::class);
    Route::resource('auxiliar', AuxiliarController::class);
    Route::resource('asistencia', AsistenciaController::class);
    Route::resource('pruebaps', PruebaPsicologicaController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
