<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes(['register' =>false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function(){
    return view('welcome');
});



Route::prefix('auth')->group(function(){
    Route::get('/login', 'Auth\LoginController@login')->name('auth.login');
    Route::get('/register', 'Auth\RegisterController@register')->name('auth.register');
    Route::post('/register', 'Auth\RegisterController@create')->name('auth.register');

});

Route::prefix('locador')->group(function(){

    Route::get('/listar','LocadorController@index')->name('locador.listar')->middleware('auth');
    Route::any('/search','LocadorController@search')->name('locador.search');
    Route::get('/novo','LocadorController@new')->name('locador.novo');
    Route::post('/salvar','LocadorController@create')->name('locador.salvar');
    Route::get('/alterar/{id}','LocadorController@edit')->name('locador.alterar');
    Route::post('/save/{id}','LocadorController@save')->name('locador.save');
    Route::get('/excluir/{id}','LocadorController@delete')->name('locador.excluir');
    Route::post('/excluir/{id}','LocadorController@excluir')->name('locador.excluir');
    Route::get('/consultar/{id}','LocadorController@show')->name('locador.consultar');

});


Route::prefix('imovel')->group(function(){

    Route::get('/listar','ImovelController@index')->name('imovel.listar');
    Route::any('/search','ImovelController@search')->name('imovel.search');
    Route::get('/novo','ImovelController@new')->name('imovel.novo');
    Route::post('/salvar','ImovelController@create')->name('imovel.salvar');
    Route::get('/alterar/{id}','ImovelController@edit')->name('imovel.alterar');
    Route::post('/save/{id}','ImovelController@save')->name('imovel.save');
    Route::get('/excluir/{id}','ImovelController@delete')->name('imovel.excluir');
    Route::post('/excluir/{id}','ImovelController@excluir')->name('imovel.excluir');
    Route::get('/consultar/{id}','ImovelController@show')->name('imovel.consultar');

});

Route::prefix('cidade')->group(function(){

    Route::get('/listar','CidadeController@index')->name('cidade.listar');
    Route::any('/search','CidadeController@search')->name('cidade.search');
    Route::get('/novo','CidadeController@new')->name('cidade.novo');
    Route::post('/salvar','CidadeController@create')->name('cidade.salvar');
    Route::get('/alterar/{id}','CidadeController@edit')->name('cidade.alterar');
    Route::post('/save/{id}','CidadeController@save')->name('cidade.save');
    Route::get('/excluir/{id}','CidadeController@delete')->name('cidade.excluir');
    Route::post('/excluir/{id}','CidadeController@excluir')->name('cidade.excluir');
    Route::get('/consultar/{id}','CidadeController@show')->name('cidade.consultar');

});


