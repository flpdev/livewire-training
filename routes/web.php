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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tarefas', [App\Http\Livewire\ListaTarefas::class, 'index'])->name('tarefas');

Route::get('/carteira', function () {
    return view('carteira.carteira-index');
});

Route::get('/categoria', function () {
    return view('categoria.categoria-index');
});

Route::get('/lancamento', function () {
    return view('lancamento.lancamento-index');
});

