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
Route::get("/producto_visita", [VisitaController::class, "producto_visita"])->name('producto_visita');
Route::get("/quienesomos_index", [VisitaController::class, "quienesomos_index"])->name('quienesomos_index');
Route::get("/login", [LoginController::class, "login"])->name('login');
Route::post("/iniciar_sesion", [LoginController::class, "iniciar_sesion"])->name('iniciar_sesion');
Route::post("/cerrar_sesion", [LogOutController::class, "cerrar_sesion"])->name('cerrar_sesion');

Route::get("/inicioAdmin_index", [AdminController::class, "inicioAdmin_index"])->name('inicioAdmin_index');
Route::get("/inventario_index", [AdminController::class, "inventario_index"])->name('inventario_index');
Route::get("/usuarios_index", [AdminController::class, "usuarios_index"])->name('usuarios_index');

Route::get("/pdfproforma", [ProformaController::class, "pdfproforma"])->name('pdfproforma');
Route::get("/proforma_index", [ProformaController::class, "proforma_index"])->name('proforma_index');
Route::post("/guardar_proforma", [ProformaController::class, "guardar_proforma"])->name('guardar_proforma');
Route::post("/producto_busqueda", [ProformaController::class, "producto_busqueda"])->name('producto_busqueda');
Route::post("/cliente_busqueda", [ProformaController::class, "cliente_busqueda"])->name('cliente_busqueda');

Route::get("/producto_index", [ProductoController::class, "producto_index"])->name('producto_index');
Route::get("/form_nuevo", [ProductoController::class, "form_nuevo"])->name('form_nuevo');
Route::get("/form_editar/{id}", [ProductoController::class, "form_editar"])->name('form_editar');
Route::post("/editar_producto", [ProductoController::class, "editar_producto"])->name('editar_producto');

Route::post("/nuevo_producto", [ProductoController::class, "nuevo_producto"])->name('nuevo_producto');
Route::post("/cargar_sucursal", [ProductoController::class, "cargar_sucursal"])->name('cargar_sucursal');
Route::post("/cargar_almacen", [ProductoController::class, "cargar_almacen"])->name('cargar_almacen');
Route::post("/eliminar_producto", [ProductoController::class, "eliminar_producto"])->name('eliminar_producto');

Route::get("/producto_detalle/{id}", [VisitaController::class, "producto_detalle"])->name('producto_detalle');
Route::get("/imagen_producto/{id}", [ProductoController::class, "imagen_producto"])->name('imagen_producto');

Route::post("/nuevo_imagen_producto", [ProductoController::class, "nuevo_imagen_producto"])->name('nuevo_imagen_producto');
Route::get("/form_nuevo_usuario", [AdminController::class, "form_nuevo_usuario"])->name('form_nuevo_usuario');
Route::post("/guardar_usuario", [AdminController::class, "guardar_usuario"])->name('guardar_usuario');

Route::post("/eliminar_usuario", [AdminController::class, "eliminar_usuario"])->name('eliminar_usuario');
Route::get("/form_editar_usuario/{id}", [AdminController::class, "form_editar_usuario"])->name('form_editar_usuario');
Route::post("/editar_usuario", [AdminController::class, "editar_usuario"])->name('editar_usuario');

Route::post("/eliminar_imagen", [ProductoController::class, "eliminar_imagen"])->name('eliminar_imagen');
