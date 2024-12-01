<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RecetasController;

Route::resource('home', HomeController::class);
Route::resource('about', AboutController::class);
Route::resource('services', ServiceController::class);
Route::resource('doctor', DoctorController::class);
Route::resource('rendez-vous', RendezVousController::class);
// Ruta para ver la lista de pacientes (GET)
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');

// Ruta para mostrar el formulario de registro de paciente (GET)
Route::get('/pacientes/crear', [PacienteController::class, 'create'])->name('pacientes.create');

// Ruta para registrar el paciente (POST)
Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');

// Ruta para editar un paciente (GET)
Route::get('/pacientes/{id}/editar', [PacienteController::class, 'edit'])->name('pacientes.edit');

// Ruta para actualizar un paciente (PUT)
Route::put('/pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');


// Ruta para eliminar un paciente (DELETE)
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

use App\Http\Controllers\RecetaController;

// Ruta para listar recetas (tabla de recetas)
Route::get('/recetas', [RecetasController::class, 'index'])->name('recetas.index');

// Ruta para mostrar el formulario de registro de recetas
Route::get('/recetas/receta', [RecetasController::class, 'create'])->name('recetas.create');

// Ruta para guardar una nueva receta
Route::post('/recetas', [RecetasController::class, 'store'])->name('recetas.store');

// Ruta para mostrar el formulario de edición de una receta específica
Route::get('/recetas/{id}/editar', [RecetasController::class, 'edit'])->name('recetas.edit');

// Ruta para actualizar una receta existente
Route::put('/recetas/{id}', [RecetasController::class, 'update'])->name('recetas.update');

// Ruta para eliminar una receta
Route::delete('/recetas/{id}', [RecetasController::class, 'destroy'])->name('recetas.destroy');

Route::get('/recetas', [RecetasController::class, 'index'])->name('recetas.index');

