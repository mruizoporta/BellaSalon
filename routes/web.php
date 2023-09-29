<?php

use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas Roles
Route::get('/roles', [App\Http\Controllers\RolController::class, 'index']);
Route::get('/roles/create', [App\Http\Controllers\RolController::class, 'create']);
Route::get('/roles/{rol}/edit', [App\Http\Controllers\RolController::class, 'edit']);
Route::post('/roles', [App\Http\Controllers\RolController::class, 'store']);
Route::put('/roles/{rol}', [App\Http\Controllers\RolController::class, 'update']);
Route::post('/roles/{rol}/inactivar', [App\Http\Controllers\RolController::class, 'destroy']);

//Rutas Usuarios
Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/usuarios/create', [App\Http\Controllers\UserController::class, 'create']);
Route::get('/usuarios/{usuario}/edit', [App\Http\Controllers\UserController::class, 'edit']);
Route::post('/usuarios', [App\Http\Controllers\UserController::class, 'store']);
Route::put('/usuarios/{usuario}', [App\Http\Controllers\UserController::class, 'update']);
Route::post('/usuarios/{usuario}/inactivar', [App\Http\Controllers\UserController::class, 'destroy']);


//Rutas Empresas
Route::get('/empresas', [App\Http\Controllers\EmpresaController::class, 'index']);
Route::get('/empresas/create', [App\Http\Controllers\EmpresaController::class, 'create']);
Route::get('/empresas/{empresa}/edit', [App\Http\Controllers\EmpresaController::class, 'edit']);
Route::post('/empresas', [App\Http\Controllers\EmpresaController::class, 'store']);
Route::put('/empresas/{empresa}', [App\Http\Controllers\EmpresaController::class, 'update']);
Route::post('/empresas/{empresa}/inactivar', [App\Http\Controllers\EmpresaController::class, 'destroy']);

//Rutas parametros generales
Route::get('/parametros/{parametro}/edit', [App\Http\Controllers\ParametroController::class, 'edit']);
Route::put('/parametros/{parametro}', [App\Http\Controllers\ParametroController::class, 'update']);

//Rutas sucursales
Route::get('/sucursales', [App\Http\Controllers\SucursalController::class, 'index']);
Route::get('/sucursales/create', [App\Http\Controllers\SucursalController::class, 'create']);
Route::get('/sucursales/{sucursal}/edit', [App\Http\Controllers\SucursalController::class, 'edit']);
Route::post('/sucursales', [App\Http\Controllers\SucursalController::class, 'store']);
Route::put('/sucursales/{sucursal}', [App\Http\Controllers\SucursalController::class, 'update']);
Route::post('/sucursales/{sucursal}/inactivar', [App\Http\Controllers\SucursalController::class, 'destroy']);

//Rutas Marcas
Route::get('/marcas', [App\Http\Controllers\MarcaController::class, 'index']);
Route::get('/marcas/create', [App\Http\Controllers\MarcaController::class, 'create']);
Route::get('/marcas/{marca}/edit', [App\Http\Controllers\MarcaController::class, 'edit']);
Route::post('/marcas', [App\Http\Controllers\MarcaController::class, 'store']);
Route::put('/marcas/{marca}', [App\Http\Controllers\MarcaController::class, 'update']);
Route::post('/marcas/{marca}/inactivar', [App\Http\Controllers\MarcaController::class, 'destroy']);

//Rutas unidades de medida
Route::get('/medidas', [App\Http\Controllers\MedidaController::class, 'index']);
Route::get('/medidas/create', [App\Http\Controllers\MedidaController::class, 'create']);
Route::get('/medidas/{medida}/edit', [App\Http\Controllers\MedidaController::class, 'edit']);
Route::post('/medidas', [App\Http\Controllers\MedidaController::class, 'store']);
Route::put('/medidas/{medida}', [App\Http\Controllers\MedidaController::class, 'update']);
Route::post('/medidas/{medida}/inactivar', [App\Http\Controllers\MedidaController::class, 'destroy']);

//Rutas catalogos
Route::get('/catalogos', [App\Http\Controllers\CatalogosController::class, 'index']);
Route::get('/catalogos/create', [App\Http\Controllers\CatalogosController::class, 'create']);
Route::get('/catalogos/{catalogo}/edit', [App\Http\Controllers\CatalogosController::class, 'edit']);
Route::post('/catalogos', [App\Http\Controllers\CatalogosController::class, 'store']);
Route::put('/catalogos/{catalogo}', [App\Http\Controllers\CatalogosController::class, 'update']);
Route::post('/catalogos/{catalogo}/inactivar', [App\Http\Controllers\CatalogosController::class, 'destroy']);

//Rutas categorias
Route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'index']);
Route::get('/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create']);
Route::get('/categorias/{categoria}/edit', [App\Http\Controllers\CategoriaController::class, 'edit']);
Route::post('/categorias', [App\Http\Controllers\CategoriaController::class, 'store']);
Route::put('/categorias/{categoria}', [App\Http\Controllers\CategoriaController::class, 'update']);
Route::post('/categorias/{categoria}/inactivar', [App\Http\Controllers\CategoriaController::class, 'destroy']);

//Rutas Tipos de salidas
Route::get('/tipossalidas', [App\Http\Controllers\TiposSalidaController::class, 'index']);
Route::get('/tipossalidas/create', [App\Http\Controllers\TiposSalidaController::class, 'create']);
Route::get('/tipossalidas/{tiposalida}/edit', [App\Http\Controllers\TiposSalidaController::class, 'edit']);
Route::post('/tipossalidas', [App\Http\Controllers\TiposSalidaController::class, 'store']);
Route::put('/tipossalidas/{tiposalida}', [App\Http\Controllers\TiposSalidaController::class, 'update']);
Route::post('/tipossalidas/{tiposalida}/inactivar', [App\Http\Controllers\TiposSalidaController::class, 'destroy']);

//Rutas Tipos de entrada
Route::get('/tiposentradas', [App\Http\Controllers\TiposEntradaController::class, 'index']);
Route::get('/tiposentradas/create', [App\Http\Controllers\TiposEntradaController::class, 'create']);
Route::get('/tiposentradas/{tipoentrada}/edit', [App\Http\Controllers\TiposEntradaController::class, 'edit']);
Route::post('/tiposentradas', [App\Http\Controllers\TiposEntradaController::class, 'store']);
Route::put('/tiposentradas/{tipoentrada}', [App\Http\Controllers\TiposEntradaController::class, 'update']);
Route::post('/tiposentradas/{tipoentrada}/inactivar', [App\Http\Controllers\TiposEntradaController::class, 'destroy']);

//Rutas Almacenes
Route::get('/almacenes', [App\Http\Controllers\AlmacenController::class, 'index']);
Route::get('/almacenes/create', [App\Http\Controllers\AlmacenController::class, 'create']);
Route::get('/almacenes/{almacen}/edit', [App\Http\Controllers\AlmacenController::class, 'edit']);
Route::post('/almacenes', [App\Http\Controllers\AlmacenController::class, 'store']);
Route::put('/almacenes/{almacen}', [App\Http\Controllers\AlmacenController::class, 'update']);
Route::post('/almacenes/{almacen}/inactivar', [App\Http\Controllers\AlmacenController::class, 'destroy']);

//Rutas productos
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index']);
Route::get('/productos/create', [App\Http\Controllers\ProductoController::class, 'create']);
Route::get('/productos/{producto}/edit', [App\Http\Controllers\ProductoController::class, 'edit']);

Route::post('/productos', [App\Http\Controllers\ProductoController::class, 'store']);
Route::put('/productos/{producto}/oferta', [App\Http\Controllers\ProductoController::class, 'storeoferta']);

Route::put('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'update']);
Route::post('/productos/{producto}/inactivar', [App\Http\Controllers\ProductoController::class, 'destroy']);

//Rutas servicios
Route::get('/servicios', [App\Http\Controllers\ProductoController::class, 'indexservicio']);
Route::get('/servicios/create', [App\Http\Controllers\ProductoController::class, 'createservicio']);
Route::get('/servicios/{producto}/edit', [App\Http\Controllers\ProductoController::class, 'editservicios']);
Route::post('/servicios', [App\Http\Controllers\ProductoController::class, 'storeservicio']);
Route::put('/servicios/{producto}', [App\Http\Controllers\ProductoController::class, 'updateservicio']);
Route::post('/servicios/{producto}/inactivar', [App\Http\Controllers\ProductoController::class, 'destroy']);

//Rutas proveedores
Route::get('/proveedores', [App\Http\Controllers\ProveedorController::class, 'index']);
Route::get('/proveedores/create', [App\Http\Controllers\ProveedorController::class, 'create']);
Route::get('/proveedores/{proveedor}/edit', [App\Http\Controllers\ProveedorController::class, 'edit']);
Route::post('/proveedores', [App\Http\Controllers\ProveedorController::class, 'store']);
Route::put('/proveedores/{proveedor}', [App\Http\Controllers\ProveedorController::class, 'update']);
Route::post('/proveedores/{proveedor}/inactivar', [App\Http\Controllers\ProveedorController::class, 'destroy']);

//Rutas existencia
Route::get('/existencias', [App\Http\Controllers\BodegaProductoController::class, 'index']);

//Rutas entradas
Route::get('/entradas', [App\Http\Controllers\EntradaController::class, 'index']);
Route::get('/entradas/create', [App\Http\Controllers\EntradaController::class, 'create']);
Route::get('/entradas/{entrada}/edit', [App\Http\Controllers\EntradaController::class, 'edit']);
Route::post('/entradas', [App\Http\Controllers\EntradaController::class, 'store']);
Route::put('/entradas/{entrada}', [App\Http\Controllers\EntradaController::class, 'update']);
Route::post('/entradas/{entrada}/inactivar', [App\Http\Controllers\EntradaController::class, 'destroy']);

//Rutas POS
Route::get('/facturas', [App\Http\Controllers\FacturaController::class, 'index']);

//Rutas empleados
Route::get('/empleados', [App\Http\Controllers\EmpleadoController::class, 'index']);
Route::get('/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'create']);
Route::get('/empleados/{empleado}/edit', [App\Http\Controllers\EmpleadoController::class, 'edit']);
Route::post('/empleados', [App\Http\Controllers\EmpleadoController::class, 'store']);
Route::put('/empleados/{empleado}', [App\Http\Controllers\EmpleadoController::class, 'update']);
Route::post('/empleados/{empleado}/inactivar', [App\Http\Controllers\EmpleadoController::class, 'destroy']);

Route::get('/citas', [App\Http\Controllers\CitasController::class, 'index']);
Route::get('/horario', [App\Http\Controllers\HorarioController::class, 'edit']);
Route::post('/horario', [App\Http\Controllers\HorarioController::class, 'store']);


