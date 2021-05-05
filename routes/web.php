<?php

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

Route::group(['middleware'=>['guest']],function(){
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/', 'Auth\LoginController@login')->name('login');
});

Route::group(['middleware'=>['auth']],function(){
    
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/dashboard','DashboardController');
    //Notificaciones
    Route::post('/notification/get','NotificationController@get');
    
    Route::get('/main', function () {
        return view('contenido/contenido');
    })->name('main');

    Route::group(['middleware' => ['Almacenero']], function () {
     
        Route::get('/articulo', 'ArticuloController@index');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');

        Route::get('/pedido', 'PedidoController@index');
        Route::get('/pedido/num', 'PedidoController@num');
        Route::post('/pedido/registrar', 'PedidoController@store');
        Route::get('/pedido/pdf/{id}', 'PedidoController@pdf')->name('pedido_pdf');

    });

    Route::group(['middleware' => ['Vendedor']], function () {

        Route::get('/dashboard','DashboardController');
        
        Route::get('/home','Home1Controller');
        Route::get('/categoria', 'CategoriaController@index');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

        Route::get('/unidad', 'UnidadController@index');
        Route::post('/unidad/registrar', 'UnidadController@store');
        Route::put('/unidad/actualizar', 'UnidadController@update');
        Route::put('/unidad/desactivar', 'UnidadController@desactivar');
        Route::put('/unidad/activar', 'UnidadController@activar');
        Route::get('/unidad/selectUnidad', 'UnidadController@selectUnidad');

        Route::get('/tiempo', 'TiempoController@index');
        Route::post('/tiempo/registrar', 'TiempoController@store');
        Route::put('/tiempo/actualizar', 'TiempoController@update');
        Route::put('/tiempo/desactivar', 'TiempoController@desactivar');
        Route::put('/tiempo/activar', 'TiempoController@activar');
        Route::get('/tiempo/selectTiempo', 'TiempoController@selectTiempo');

        Route::get('/estado', 'EstadoController@index');
        Route::post('/estado/registrar', 'EstadoController@store');
        Route::put('/estado/actualizar', 'EstadoController@update');
        Route::put('/estado/desactivar', 'EstadoController@desactivar');
        Route::put('/estado/activar', 'EstadoController@activar');
        Route::get('/estado/selectEstado', 'EstadoController@selectEstado');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::post('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/obtenerCabecera', 'ArticuloController@obtenerCabecera');
        Route::get('/articulo/obtenerDetalles', 'ArticuloController@obtenerDetalles');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');
        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/producto/listarPdf', 'ArticuloController@listarPdf')->name('productos_pdf');
        Route::get('/producto/listarPdfarea1', 'ArticuloController@listarPdfarea1')->name('articulosarea1_pdf');
        Route::get('/producto/listarPdfarea2', 'ArticuloController@listarPdfarea2')->name('articulosarea2_pdf');
        Route::get('/producto/listarPdfarea3', 'ArticuloController@listarPdfarea3')->name('articulosarea3_pdf');
        Route::get('/producto/listarPdfarea4', 'ArticuloController@listarPdfarea4')->name('articulosarea4_pdf');
        Route::get('/producto/listarPdfarea5', 'ArticuloController@listarPdfarea5')->name('articulosarea5_pdf');
        Route::get('/producto/listarPdfarea6', 'ArticuloController@listarPdfarea6')->name('articulosarea6_pdf');
        Route::get('/producto/listarPdfarea7', 'ArticuloController@listarPdfarea7')->name('articulosarea7_pdf');
        Route::get('/producto/listarPdfarea8', 'ArticuloController@listarPdfarea8')->name('articulosarea8_pdf');
        Route::get('/producto/listarPdfarea9', 'ArticuloController@listarPdfarea9')->name('articulosarea9_pdf');

       
        Route::get('/venta', 'VentaController@index');
        Route::get('/venta/num', 'VentaController@num');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
        Route::get('/despacho/pdf/{id}', 'VentaController@pdf')->name('venta_pdf');

        Route::get('/pedido', 'PedidoController@index');
        Route::get('/pedido/num', 'PedidoController@num');
        Route::post('/pedido/registrar', 'PedidoController@store');
        Route::put('/pedido/desactivar', 'PedidoController@desactivar');
        Route::get('/pedido/obtenerCabecera', 'PedidoController@obtenerCabecera');
        Route::get('/pedido/obtenerDetalles', 'PedidoController@obtenerDetalles');
        Route::get('/pedido/pdf/{id}', 'PedidoController@pdf')->name('pedido_pdf');

        Route::get('/ingreso', 'IngresoController@index');
        Route::get('/ingreso/num', 'IngresoController@num');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
        Route::get('/ingreso/pdf/{id}', 'IngresoController@pdf')->name('ingreso_pdf');
    });

    Route::group(['middleware' => ['Administrador']], function () {
        
        Route::get('/home','Home1Controller');
        Route::get('/dashboard','DashboardController');
        
        Route::get('/categoria', 'CategoriaController@index');
        Route::post('/categoria/registrar', 'CategoriaController@store');
        Route::put('/categoria/actualizar', 'CategoriaController@update');
        Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
        Route::put('/categoria/activar', 'CategoriaController@activar');
        Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

        Route::get('/unidad', 'UnidadController@index');
        Route::post('/unidad/registrar', 'UnidadController@store');
        Route::put('/unidad/actualizar', 'UnidadController@update');
        Route::put('/unidad/desactivar', 'UnidadController@desactivar');
        Route::put('/unidad/activar', 'UnidadController@activar');
        Route::get('/unidad/selectUnidad', 'UnidadController@selectUnidad');

        Route::get('/tiempo', 'TiempoController@index');
        Route::post('/tiempo/registrar', 'TiempoController@store');
        Route::put('/tiempo/actualizar', 'TiempoController@update');
        Route::put('/tiempo/desactivar', 'TiempoController@desactivar');
        Route::put('/tiempo/activar', 'TiempoController@activar');
        Route::get('/tiempo/selectTiempo', 'TiempoController@selectTiempo');

        Route::get('/estado', 'EstadoController@index');
        Route::post('/estado/registrar', 'EstadoController@store');
        Route::put('/estado/actualizar', 'EstadoController@update');
        Route::put('/estado/desactivar', 'EstadoController@desactivar');
        Route::put('/estado/activar', 'EstadoController@activar');
        Route::get('/estado/selectEstado', 'EstadoController@selectEstado');

        Route::get('/articulo', 'ArticuloController@index');
        Route::post('/articulo/registrar', 'ArticuloController@store');
        Route::post('/articulo/actualizar', 'ArticuloController@update');
        Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
        Route::put('/articulo/activar', 'ArticuloController@activar');
        Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
        Route::get('/articulo/listarArticulo', 'ArticuloController@listarArticulo');
        Route::get('/articulo/obtenerCabecera', 'ArticuloController@obtenerCabecera');
        Route::get('/articulo/obtenerDetalles', 'ArticuloController@obtenerDetalles');
        Route::get('/articulo/listarArticuloVenta', 'ArticuloController@listarArticuloVenta');
        Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
        Route::get('/producto/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');
        Route::get('/producto/listarPdfarea1', 'ArticuloController@listarPdfarea1')->name('articulosarea1_pdf');
        Route::get('/producto/listarPdfarea2', 'ArticuloController@listarPdfarea2')->name('articulosarea2_pdf');
        Route::get('/producto/listarPdfarea3', 'ArticuloController@listarPdfarea3')->name('articulosarea3_pdf');
        Route::get('/producto/listarPdfarea4', 'ArticuloController@listarPdfarea4')->name('articulosarea4_pdf');
        Route::get('/producto/listarPdfarea5', 'ArticuloController@listarPdfarea5')->name('articulosarea5_pdf');
        Route::get('/producto/listarPdfarea6', 'ArticuloController@listarPdfarea6')->name('articulosarea6_pdf');
        Route::get('/producto/listarPdfarea7', 'ArticuloController@listarPdfarea7')->name('articulosarea7_pdf');
        Route::get('/producto/listarPdfarea8', 'ArticuloController@listarPdfarea8')->name('articulosarea8_pdf');
        Route::get('/producto/listarPdfarea9', 'ArticuloController@listarPdfarea9')->name('articulosarea9_pdf');

        Route::get('/proveedor', 'ProveedorController@index');
        Route::post('/proveedor/registrar', 'ProveedorController@store');
        Route::put('/proveedor/actualizar', 'ProveedorController@update');
        Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');
        
        Route::get('/cliente', 'ClienteController@index');
        Route::post('/cliente/registrar', 'ClienteController@store');
        Route::put('/cliente/actualizar', 'ClienteController@update');
        Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');

        Route::get('/venta', 'VentaController@index');
        Route::get('/venta/num', 'VentaController@num');
        Route::post('/venta/registrar', 'VentaController@store');
        Route::put('/venta/desactivar', 'VentaController@desactivar');
        Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
        Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
        Route::get('/despacho/pdf/{id}', 'VentaController@pdf')->name('venta_pdf');

        Route::get('/pedido', 'PedidoController@index');
        Route::get('/pedido/num', 'PedidoController@num');
        Route::post('/pedido/registrar', 'PedidoController@store');
        Route::put('/pedido/desactivar', 'PedidoController@desactivar');
        Route::get('/pedido/obtenerCabecera', 'PedidoController@obtenerCabecera');
        Route::get('/pedido/obtenerDetalles', 'PedidoController@obtenerDetalles');
        Route::get('/pedido/pdf/{id}', 'PedidoController@pdf')->name('pedido_pdf');

        Route::get('/rol', 'RolController@index');
        Route::get('/rol/selectRol', 'RolController@selectRol');
        
        Route::get('/user', 'UserController@index');
        Route::post('/user/registrar', 'UserController@store');
        Route::post('/user/actualizar', 'UserController@update');
        Route::put('/user/desactivar', 'UserController@desactivar');
        Route::put('/user/activar', 'UserController@activar');

        Route::get('/ingreso', 'IngresoController@index');
        Route::get('/ingreso/num', 'IngresoController@num');
        Route::post('/ingreso/registrar', 'IngresoController@store');
        Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
        Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
        Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');
        Route::get('/ingreso/pdf/{id}', 'IngresoController@pdf')->name('ingreso_pdf');
    });

});

//Route::get('/home', 'HomeController@index')->name('home');
