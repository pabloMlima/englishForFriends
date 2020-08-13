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

Route::get('/', 'HomeController@index')->middleware('authSession');
Route::get('/login', 'LoginController@index');
Route::post('/login/validar', 'LoginController@validaLogin');
Route::post('/cards/cadastrar', 'CardsController@store')->middleware('authSession');
Route::post('/usuarios/insere-novo', 'UsuariosController@store')->middleware('authSession');

Route::get('/grupos/', 'GruposController@index')->middleware('authSession');
Route::get('/forum/', 'ForumController@index')->middleware('authSession');
Route::get('/forum/news', 'ForumController@pagNews')->middleware('authSession');
Route::get('/forum/cards', 'ForumController@pagCards')->name('/forum/cards')->middleware('authSession');
Route::get('/forum/youtube', 'ForumController@pagYoutube')->middleware('authSession');
Route::get('/forum/text', 'ForumController@pagText')->middleware('authSession');
Route::get('/forum/phrashal-verbs', 'ForumController@pagPhraVerbs')->middleware('authSession');
Route::get('/forum/tips', 'ForumController@pagTips')->middleware('authSession');
Route::post('/forum/insere-conteudo', 'ForumController@insereConteudo')->middleware('authSession');

Route::post('/usuarios/salva-edicao', 'UsuariosController@updateInfoUsers')->middleware('authSession');
Route::get('/home/favoritos-tipo/{tipo}', 'UsuariosController@favoritos')->middleware('authSession');
Route::post('/home/favoritos/deletar', 'UsuariosController@deleteFavoritos')->middleware('authSession');
Route::post('/cards/deletar', 'CardsController@deletarCardUsuario')->middleware('authSession');
Route::post('/forum/deletar/conteudo', 'ForumController@deletarConteudoForum')->middleware('authSession');
Route::get('/logout', 'LoginController@logout');

