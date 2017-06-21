<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/cliente/informacion','WebController@info')->name('cliente.info');
Route::post('/cliente/informacion','WebController@addSolicitud')->name('cliente.info.subtmit');

Route::get('/negocio/form','WebController@llenarcampos')->name('negocio.form');


Route::group(['prefix' => 'usuarios'],(function(){
    Route::get('/home','UsuarioController@index')->name('home.usuarios');
    Route::post('/prueba','UsuarioController@prueba')->name('prueba');
    Route::POST('/nuevoevento','UsuarioController@nuevoEvento')->name('nuevo.evento');
}));
/*
Route::get('/usuarios/home',function(){
    return view('usuarios.home');
})->middleware('auth');
*/
Route::group(['prefix' => 'admin'],(function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::POST('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/','AdminController@index')->name('admin.dashboard');

}));

Route::group(['prefix' => 'cliente'],(function(){
    Route::get('/login','Auth\ClienteLoginController@showLoginForm')->name('cliente.login');
    Route::POST('/login','Auth\ClienteLoginController@login')->name('cliente.login.submit');
    Route::get('/','ClienteController@index')->name('cliente.dashboard');

}));




Route::get('/wslistarcanchas', 'AndroidWs@serviceObtenerCanchas');
Route::get('/wsobtubineg/{id}', 'AndroidWs@serviceObtenerUbicacionCancha');
Route::get('/wsobtubicaciones', 'AndroidWs@serviceObtenerUbicaciones');
Route::get('/wsobtdistritos', 'AndroidWs@serviceObtenerDistritos');
Route::get('/wsobtcanchdist/{nCodDist}', 'AndroidWs@serviceObtenerCanchasPorDistrito');
Route::get('/wsobteventos/{nCodNeg}', 'AndroidWs@serviceObtenerEventos');
Route::get('/wsobteventosweb', 'AndroidWs@obtenerEventosWeb');

Route::get('/pgprueba', 'AndroidWs@servicepgprueba');