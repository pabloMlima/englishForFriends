<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/login/frases-list-validation', 'LoginController@listaFrases');
Route::post('/login/validation-frase', 'LoginController@validFrases');

Route::post('/usuarios/novo-cadastro', 'Api\UsuariosController@store');
Route::post('/forum/visualiza-texto', 'Api\ForumController@visualizarTexto');
Route::post('/forum/salva-favoritos-conteudo', 'Api\ForumController@salvarFavoritos');
