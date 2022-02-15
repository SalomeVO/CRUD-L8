<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudenController; //necesario para las rutas

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

//Ruta de Lista
Route::get('/', [StudenController::class,'lista']);

//Ruta de Formulario Guardar
Route::get('/form', [StudenController::class,'form']);

//Ruta para Guardar al usuario
Route::post('/Estudiante/crearStuden', [StudenController::class,'save'])->name('Estudiante.save');

//Ruta para Eliminar
Route::delete('/delete/{id}', [StudenController::class,'delete'])->name('delete');
