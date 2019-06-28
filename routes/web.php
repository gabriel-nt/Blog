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

Route::get('/', 'NoticiasController@index');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/noticias/show/{id}','NoticiasController@show')->name('noticias.view'); 
Route::post('/noticias/enviar-comentario','ComentariosController@store')->name('noticias.enviar-comentario');
Route::post('/noticias/cadastrar-email','EmailsController@store')->name('noticias.cadastrar-email');
Route::post('/noticias/contatar', 'NoticiasController@sendContact')->name('noticias.send');
/*Route::get('/noticias/index','NoticiasController@index')->name('noticias.index');
Route::get('/noticias/create','NoticiasController@create')->name('noticias.create');
Route::get('/noticias/show/{id}','NoticiasController@show')->name('noticias.show');
Route::get('/noticias/edit/{id}','NoticiasController@edit')->name('noticias.edit');
Route::post('/noticias','NoticiasController@store')->name('noticias.store');
Route::put('/noticias/update','NoticiasController@update')->name('noticias.update');
Route::get('/noticias/delete/{id}','NoticiasController@delete')->name('noticias.delete');
Route::delete('/noticias/delete/{id}','NoticiasController@destroy')->name('noticias.destroy');*/

Route::middleware(['auth'])->group(function () {
    Route::resource('/noticias','NoticiasController'); 
    Route::get('/noticias/delete/{id}','NoticiasController@delete')->name('noticias.delete');
    Route::get('/noticias/destroy/{id}','NoticiasController@destroy')->name('noticias.destroy');
    Route::get('/user/admin/','Auth\UserController@admin')->name('user.admin');
});