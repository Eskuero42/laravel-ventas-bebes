<?php

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\CaracteristicasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\Users\PrincipalController;
use App\Http\Controllers\ProductossController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\EspecificacionesController;
use App\Http\Controllers\Users\u_CategoriasController;
use App\Http\Controllers\Users\u_ProductosController;
use App\Http\Controllers\Users\u_SlidersController;
use App\Http\Controllers\PersonasController;
use Faker\Provider\ar_EG\Person;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
// user
Route::get('/', [PrincipalController::class, 'principal'])->name('principal');
Route::get('/login', [PrincipalController::class, 'login'])->name('login');
Route::get('/admin/dashboard', [PrincipalController::class, 'index'])->name('admin.dashboard');

Route::get('/categorias/listar/{id}', [u_CategoriasController::class, 'u_categoriasListar'])->name('user.categorias.listar');
Route::get('/productos/ver/{id}', [u_ProductosController::class, 'u_productosver'])->name('user.productos.ver');
/* ------------- USER CATEGORIAS ---------------------------- */

Route::get('/admin/sliders/listar', [u_SlidersController::class, 'u_slidersListar'])->name('user.sliders.listar');
Route::post('/admin/sliders-registrar', [u_SlidersController::class, 'u_slidersRegistrarCategoria'])->name('user.sliders.registrar');
Route::post('/admin/sliders-actualizar', [u_SlidersController::class, 'u_slidersActualizarCategoria'])->name('user.sliders.actualizar');


/* ------------- USER CATEGORIAS ---------------------------- */
//categorias
Route::get('/admin/categorias/listar', [CategoriasController::class, 'categoriaslistar'])->name('admin.categorias.listar');
Route::get('/admin/subcategorias/ver', [CategoriasController::class, 'subcategoriasver'])->name('admin.subcatergorias.ver');
Route::post('/admin/categorias/registrar', [CategoriasController::class, 'categoriasregistrar'])->name('admin.categorias.registrar');
Route::post('/admin/categorias/editar', [CategoriasController::class, 'categoriaseditar'])->name('admin.categorias.editar');

//Productos
Route::get('/admin/productos/ver', [ProductossController::class, 'productosver'])->name('admin.productos.ver');
Route::get('/admin/productos/listar', [ProductossController::class, 'productosListar'])->name('admin.productos.listar');
Route::get('/admin/productos/vertodos/{id}', [ProductossController::class, 'productosvertodos'])->name('admin.productos.vertodos');
Route::get('/admin/articulos/ver', [ProductossController::class, 'articulosver'])->name('admin.articulos.ver');
Route::post('/admin/productos/registrar', [ProductossController::class, 'registrarproducto'])->name('admin.productos.registrar');
Route::get('/admin/productos/buscar/{codigo}', [ProductossController::class, 'buscarPorCodigo'])->name('admin.productos.buscarPorCodigo');
Route::post('/admin/productos/actualizar', [ProductossController::class, 'actualizarproducto'])->name('admin.productos.actualizar');

//Tipos
Route::get('/admin/tipos/ver', [TiposController::class, 'tiposver'])->name('admin.tipos.ver');
Route::post('/admin/tipos/registrar', [TiposController::class, 'tiposregistrar'])->name('admin.tipos.registrar');
Route::post('/admin/tipos/editar', [TiposController::class, 'tiposeditar'])->name('admin.tipos.editar');
Route::delete('/admin/tipos/eliminar', [TiposController::class, 'tiposeliminar'])->name('admin.tipos.eliminar');


//Especificaciones
Route::get('/admin/especificaciones/ver', [EspecificacionesController::class, 'especificacionescrear'])->name('admin.especificaciones.ver');
Route::post('/admin/especificaciones/registrar', [EspecificacionesController::class, 'especificacionesregistrar'])->name('admin.especificaciones.registrar');
Route::get('/admin/especificaciones/editar', [EspecificacionesController::class, 'especificacioneseditar'])->name('admin.especificaciones.editar');
Route::delete('/admin/especificaciones/eliminar', [EspecificacionesController::class, 'especificacioneseliminar'])->name('admin.especificaciones.eliminar');


//Articulos
Route::get('/admin/articulos/listar/{producto_id}', [ArticulosController::class, 'articuloslistar'])->name('admin.articulos.listar');
Route::post('/admin/articulos/registrar', [ArticulosController::class, 'registrararticulo'])->name('admin.articulos.registrar');
Route::get('/admin/articulos/editar', [ArticulosController::class, 'editarArticulo'])->name('admin.articulos.editar');

//Detalles
Route::post('/admin/detalles/editar-varios', [DetallesController::class, 'editardetalles'])->name('admin.editar.detalles');
Route::post('/admin/detalles/registrar', [DetallesController::class, 'registrardetalles'])->name('admin.registrar.detalles');
Route::post('/admin/detalles/editar-uno', [DetallesController::class, 'editardetalle'])->name('admin.editar.detalle');
Route::post('/admin/detalles/eliminar-uno', [DetallesController::class, 'eliminarDetalle'])->name('admin.eliminar.detalle');

//caracteristicas
Route::post('/admin/caracteristicas/registrar', [CaracteristicasController::class, 'registrarcaracteristicas'])->name('admin.registrar.caracteristicas');
Route::post('/admin/caracteristicas/editar-varios', [CaracteristicasController::class, 'editarcaracteristicas'])->name('admin.editar.caracteristicas');
Route::post('/admin/caracteristicas/editar-uno', [CaracteristicasController::class, 'editarCaracteristica'])->name('admin.editar.caracteristica');
Route::post('/admin/caracteristicas/elimiar-uno', [CaracteristicasController::class, 'eliminarCaracteristica'])->name('admin.eliminar.caracteristica');

// Personas
Route::get('/admin/personas/ver', [PersonasController::class, 'personasver'])->name('admin.personas.ver');
Route::post('/admin/personas/registrar', [PersonasController::class, 'personasregistrar'])->name('admin.personas.registrar');
Route::post('/admin/personas/editar', [PersonasController::class, 'personaseditar'])->name('admin.personas.editar');

//compras
Route::get('/admin/compras/listar', [ComprasController::class, 'compraslistar'])->name('admin.compras.listar');
Route::get('/admin/compras/detalles/{id}', [ComprasController::class, 'verdetalles'])->name('admin.compras.verdetalles');
Route::post('/admin/comprar/registrar', [ComprasController::class, 'comprasRegistrar'])->name('admin.compras.registrar');
