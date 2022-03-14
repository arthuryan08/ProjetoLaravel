<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/products')->group(function(){

    Route::get('/', [ProductsController::class, 'list'])->name('products.list'); //Listagem de produtos

    Route::get('new', [ProductsController::class, 'new'])->name('products.new'); //Tela de adição de novos produtos
    Route::post('new', [ProductsController::class, 'store']); //Ação de adição de novos produtos

    Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('products.edit'); //Tela de edição
    Route::post('edit/{id}', [ProductsController::class, 'editAction']); //Ação de edição

    Route::get('delete/{id}', [ProductsController::class, 'del'])->name('products.del'); // Ação de deletar

});