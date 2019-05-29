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

//protected $redirectPath = '/dashboard';

//Route::get('/', function () {
//    return view('welcome');
//});


//Route::auth();

//Auth::routes();

Route::get('/', function() {
	// e realidad va home
	return redirect('home');
});  

Route::auth();
Route::group(['middleware' => ['auth']], function () {


Route::get('imprimircan',array(
    'as'=>'imprimircan',
    'uses'=>'Admin\InformeController@imprimircan'
));
	

Route::get('informemensual',array(
    'as'=>'informemensual',
    'uses'=>'Admin\InformeController@informemensual'
));
	

	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('seguros', 'Admin\SeguroController');

	Route::resource('proveedors', 'Admin\ProveedorController');

	Route::resource('productos', 'Admin\ProductoController');

	Route::resource('canastas', 'Admin\CanastaController');

	Route::resource('reservas', 'Admin\CompraController');

	Route::resource('carritos', 'Admin\CarritoController');
	Route::resource('carritos1', 'Admin\CarritoController');

	//Route::resource('imprimircan', 'Admin\InformeController@imprimircan');
});

