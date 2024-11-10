<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TecnicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ReporteController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('report', ReporteController::class);
Route::get('/reports/filter/{fecha}', [ReporteController::class, 'filterByDate'])->name('reports.filter');
require __DIR__ . '/auth.php';

Route::get('/tecnicos', [TecnicoController::class, 'index'])->name('tecnicos.index');
Route::get('/tecnicos/asignar/{id_tecnico}/{id_reporte}', [TecnicoController::class, 'asignarTecnico'])->name('tecnico.asignar');
