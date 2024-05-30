<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');
Route::post('/views/busqueda', [App\Http\Controllers\HomeController::class, 'busqueda'])->name('busqueda');
Route::get('/views/perfil', [App\Http\Controllers\HomeController::class, 'perfil'])->name('perfil');
Route::post('/views/update', [App\Http\Controllers\HomeController::class, 'update'])->name('perfil.update');



Route::get('/admin/user', [App\Http\Controllers\UsersController::class, 'usuarios'])->name('usuario');
Route::get('/admin/inactivos', [App\Http\Controllers\UsersController::class, 'inactivos'])->name('inactivo');
Route::post('/registrar', [App\Http\Controllers\UsersController::class, 'create'])->name('usuario.create');
Route::post('/regist', [App\Http\Controllers\UsersController::class, 'createlayaway'])->name('usuario.createlayaway');
Route::post('/{id}/actualizar', [App\Http\Controllers\UsersController::class, 'update'])->name('usuario.update');
Route::post('/users/{id}', [App\Http\Controllers\UsersController::class, 'updateStatus'])->name('usuario.delete');


Route::get('/admin/proveedores', [App\Http\Controllers\UsersController::class, 'proveedores'])->name('proveedor');


Route::get('/admin/clientes', [App\Http\Controllers\UsersController::class, 'clientes'])->name('cliente');


Route::get('/admin/productos', [App\Http\Controllers\ProductsController::class, 'productos'])->name('producto');
Route::get('/admin/productos/categorias', [App\Http\Controllers\ProductsController::class, 'categorias'])->name('categorias');
Route::get('/admin/productos/cuidadopersonal', [App\Http\Controllers\ProductsController::class, 'cuidadopersonal'])->name('cuidadopersonal');
Route::get('/admin/productos/bolsos', [App\Http\Controllers\ProductsController::class, 'bolsos'])->name('bolsos');
Route::get('/admin/productos/accesorios', [App\Http\Controllers\ProductsController::class, 'accesorios'])->name('accesorios');
Route::post('/producto/registrar', [App\Http\Controllers\ProductsController::class, 'create'])->name('producto.create');
Route::post('/{id}/update', [App\Http\Controllers\ProductsController::class, 'update'])->name('producto.update');
Route::post('/products/{id}', [App\Http\Controllers\ProductsController::class, 'updateStatus'])->name('producto.delete');


Route::get('/admin/ventas', [App\Http\Controllers\SalesController::class, 'ventas'])->name('venta');
Route::get('/admin/nuevaventa', [App\Http\Controllers\SalesController::class, 'nuevaventa'])->name('nuevaventa');
Route::post('/admin/venta', [App\Http\Controllers\SalesController::class, 'create'])->name('venta.create');
Route::get('/get-customer-info/{id}', [App\Http\Controllers\SalesController::class, 'getCustomerInfo']);


Route::get('/admin/apartados', [App\Http\Controllers\LayawaysController::class, 'apartados'])->name('apartado');
Route::post('/apartado/registrar', [App\Http\Controllers\LayawaysController::class, 'create'])->name('apartado.create');
Route::post('/apartado/{id}', [App\Http\Controllers\LayawaysController::class, 'delete'])->name('apartado.delete');

Route::get('/admin/sitio', [App\Http\Controllers\HomeController::class, 'sitio'])->name('sitio');


Route::get('/admin/reportes', [App\Http\Controllers\ReportsController::class, 'reportes'])->name('reporte');
Route::get('/admin/usuarios', [App\Http\Controllers\ReportsController::class, 'usuarios'])->name('usuarios');
Route::get('/admin/prove', [App\Http\Controllers\ReportsController::class, 'prove'])->name('prove');
Route::get('/admin/clie', [App\Http\Controllers\ReportsController::class, 'clie'])->name('clie');
Route::get('/admin/prod', [App\Http\Controllers\ReportsController::class, 'prod'])->name('prod');
Route::get('/admin/ven', [App\Http\Controllers\ReportsController::class, 'ven'])->name('ven');



