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
    Route::post('/prueba','UsuarioController@insertarEvento')->name('prueba');
    Route::post('/evento/insertar','UsuarioController@insertarEvento2')->name('insertar.evento');
    Route::post('/evento/editar','UsuarioController@editarEvento')->name('editar.evento');
    Route::POST('/form/editar/evento','UsuarioController@formEditarEvento')->name('form.editar.evento');
    Route::POST('/nuevoevento','UsuarioController@nuevoEvento')->name('nuevo.evento');
    Route::get('/evento/list','UsuarioController@listarEventos')->name('list.evento');
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

/******************** ********    CONFIGURACION   ******************  **********/
Route::group(['namespace'=>'configuracion'],function(){

    /******************** *****  CONF. CANCHAS   ***************************/
    Route::resource('conf_canchas','CanchasController');
    Route::get('modal_cancha_nueva','CanchasController@modal_cancha_nueva');
   /* Route::post('select_provincias', 'MemoriaDescController@provincias_por_dep');
    Route::post('select_distritos', 'MemoriaDescController@distritos_por_prov');
    Route::get('dlg_new_mem_desc', 'MemoriaDescController@dlg_new_mem_desc');
    Route::get('list_memo_desc','MemoriaDescController@list_memo_desc');
    Route::post('insert_new_memo_desc', 'MemoriaDescController@insert_new_memo_desc');
    Route::post('update_memo_desc', 'MemoriaDescController@update_memo_desc');
    Route::post('delete_memo_desc', 'MemoriaDescController@delete_memo_desc');
    Route::get('pre_reporte_md/{id}','MemoriaDescController@reporte_ficha');*/

    /******** ***************** CONF. NEGOCIO ******************** *********/
  /*  Route::resource('propietarios_mdesc','PropietariosController');
    Route::get('list_propietarios','PropietariosController@getPropietarios');
    Route::post('insert_new_propietario', 'PropietariosController@insert_new_propietario');
    Route::post('update_propietario', 'PropietariosController@update_propietario');
    Route::post('delete_propietario', 'PropietariosController@delete_propietario');*/



});


Route::get('/wslistarcanchas', 'AndroidWs@serviceObtenerCanchas');
Route::get('/wsobtubineg/{id}', 'AndroidWs@serviceObtenerUbicacionCancha');
Route::get('/wsobtubicaciones', 'AndroidWs@serviceObtenerUbicaciones');
Route::get('/wsobtdistritos', 'AndroidWs@serviceObtenerDistritos');
Route::get('/wsobtcanchdist/{nCodDist}', 'AndroidWs@serviceObtenerCanchasPorDistrito');
Route::get('/wsobteventos/{nCodNeg}', 'AndroidWs@serviceObtenerEventos');
Route::get('/wsobteventosweb', 'AndroidWs@obtenerEventosWeb');

Route::get('/pgprueba', 'AndroidWs@servicepgprueba');