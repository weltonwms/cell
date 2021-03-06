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

Route::get('/', function () {
    return view('auth.login');
});

// Authentication Routes...
       Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
       Route::post('login', 'Auth\LoginController@login');
       Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/produtosMaisVendidos', 'HomeController@produtosMaisVendidos');
Route::get('/produtosMaiorLucro', 'HomeController@produtosMaiorLucro');

Route::group(['middleware' => 'auth'], function()
{
   Route::resource('clientes', 'ClienteController');
  
   Route::resource('produtos', 'ProdutoController');
   
   Route::resource('vendas', 'VendaController');

   Route::match(['get', 'post'],'/relatorio', 'RelatorioController@index')->name('relatorio.index');
    //Route::post('/relatorio', 'RelatorioController@consultar')->name('relatorio.consultar');
   
});