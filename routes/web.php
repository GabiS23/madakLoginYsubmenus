<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\ProformaController;
use App\Http\Controllers\ProductoController;
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

Route::get('/', function () {
    return view('contenedor/visita/inicio');
});

Auth::routes();
Route::get("/contacto_index", [VisitaController::class, "contacto_index"])->name('contacto_index');
Route::get("/inicio_index", [VisitaController::class, "inicio_index"])->name('inicio_index');
Route::get("/producto_index", [VisitaController::class, "producto_index"])->name('producto_index');
Route::get("/quienesomos_index", [VisitaController::class, "quienesomos_index"])->name('quienesomos_index');
Route::get("/login", [LoginController::class, "login"])->name('login');
Route::post("/iniciar_sesion", [LoginController::class, "iniciar_sesion"])->name('iniciar_sesion');
Route::post("/cerrar_sesion", [LogOutController::class, "cerrar_sesion"])->name('cerrar_sesion');

Route::get("/inicioAdmin_index", [AdminController::class, "inicioAdmin_index"])->name('inicioAdmin_index');
Route::get("/inventario_index", [AdminController::class, "inventario_index"])->name('inventario_index');
Route::get("/producto_index", [ProductoController::class, "producto_index"])->name('producto_index');
Route::get("/usuarios_index", [AdminController::class, "usuarios_index"])->name('usuarios_index');

Route::get("/pdfproforma", [ProformaController::class, "pdfproforma"])->name('pdfproforma');
Route::get("/proforma_index", [ProformaController::class, "proforma_index"])->name('proforma_index');
Route::post("/guardar_proforma", [ProformaController::class, "guardar_proforma"])->name('guardar_proforma');
Route::post("/producto_busqueda", [ProformaController::class, "producto_busqueda"])->name('producto_busqueda');
Route::post("/cliente_busqueda", [ProformaController::class, "cliente_busqueda"])->name('cliente_busqueda');
