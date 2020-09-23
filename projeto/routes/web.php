<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::namespace('Auth')->group(function(){
    Route::get('/', 'LoginController@carregalogin')->name('page.login');
    Route::get('/login', 'LoginController@carregalogin')->name('page.login');
    Route::get('/logout', 'LoginController@logout')->name('user.logout');
    Route::post('/login', 'LoginController@login')->name('user.login');

    Route::get('/verify_account', 'RegisterController@verify_account');

    Route::get('/usuario/mailpage', 'RegisterController@mailpage');

    Route::get('/reset_password', 'RegisterController@showResetPasswordPage');
    
    Route::post('/usuario/recuperar/senha', 'RegisterController@forgotPassword');

    Route::get('registrar', 'RegisterController@index')->name('usuario.registrar');
    Route::post('/usuario/registrar', 'RegisterController@registrar')->name('usuario.registrar');

    Route::post('/usuario/reset/senha', 'RegisterController@resetPassword');

});

//Auth::routes();




Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
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

Route::prefix('usuario')->group(function(){

    Route::get('/listar','UsuarioController@index')->name('usuario.listar');
    Route::any('/search','UsuarioController@search')->name('usuario.search');
    Route::get('/novo','UsuarioController@new')->name('usuario.novo');
    Route::post('/salvar','UsuarioController@create')->name('usuario.salvar');
    Route::get('/alterar/{id}','UsuarioController@edit')->name('usuario.alterar');
    Route::post('/save/{id}','UsuarioController@save')->name('usuario.save');
    Route::get('/excluir/{id}','UsuarioController@delete')->name('usuario.excluir');
    Route::post('/excluir/{id}','UsuarioController@excluir')->name('usuario.excluir');
    Route::get('/consultar/{id}','UsuarioController@show')->name('usuario.consultar');

});


