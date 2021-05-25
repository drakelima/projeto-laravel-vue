<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Artigo;

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
    $lista = Artigo::listaArtigosSite(3);
    //$lista = new Artigo();
    //$lista = $lista->listaArtigosSite(3);
    return view('site',compact('lista'));
});

Auth::routes();

Route::get('/admin', 'AdminCOntroller@index')->name('admin');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){
    
    Route::resource('artigos', 'ArtigosController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('autores', 'AutoresController');
});
