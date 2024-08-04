<?php

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

Route::prefix('/controle-orcamentario')->group(function () {
    Route::get('/','indexController@index')->name('controle-orcamentario.principal');
    // RENDA MENSAL
    Route::get('/renda-mensal/{ANO?}/{MES?}','RendaMensalController@index')->name('controle-orcamentario.rendaMensal');
    Route::get('/renda-mensal/create/{ANO}/{MES}/{COD_RENDA_MENSAL?}','RendaMensalController@create')->name('controle-orcamentario.rendaMensal.create');
    Route::post('/renda-mensal/store','RendaMensalController@store')->name('controle-orcamentario.rendaMensal.store');
    Route::get('/renda-mensal/show/{ANO}/{MES}','RendaMensalController@show')->name('controle-orcamentario.rendaMensal.show');
    Route::post('/renda-mensal/delete/','RendaMensalController@delete')->name('controle-orcamentario.rendaMensal.delete');
    
    // DESPESA MENSAL
    Route::get('/despesa-mensal/{ANO?}/{MES?}','DespesaMensalController@index')->name('controle-orcamentario.despesaMensal');
    Route::get('/despesa-mensal/show/{ANO}/{MES}','DespesaMensalController@show')->name('controle-orcamentario.despesaMensal.show');
    Route::get('/despesa-mensal/create/{ANO}/{MES}/{COD_DESPESA_MENSAL?}','DespesaMensalController@create')->name('controle-orcamentario.despesaMensal.create');
    Route::post('/despesa-mensal/store','DespesaMensalController@store')->name('controle-orcamentario.despesaMensal.store');
    Route::post('/despesa-mensal/delete/','DespesaMensalController@delete')->name('controle-orcamentario.despesaMensal.delete');
});
