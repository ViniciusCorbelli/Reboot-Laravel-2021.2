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

Auth::routes();

//para ver suas rotas basta user php artisan route:list


//domínio
//Route::domain('{account}.example.com')->group(function () {



//prefixo
//Route::prefix('admin')->group(function () {

//rotas que precisa estar logado para poder utilizar
//Route::middleware('auth')->group(function () {


Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('admin.layouts.app');
    })->name('dashboard');

    Route::resource('/users', 'UserController');
    Route::resource('/categorias', 'CategoriasController');
    Route::resource('/produtos', 'ProdutosController');
    
});
