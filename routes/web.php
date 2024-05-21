<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutosController::class, 'index'])->name('produtos.index');
    Route::get('/create', [ProdutosController::class, 'create'])->name('produtos.create');
    Route::post('/store', [ProdutosController::class, 'create'])->name('produtos.store');
    Route::get('/edit/{id}', [ProdutosController::class, 'update'])->name('produtos.edit');
    Route::put('/update/{id}', [ProdutosController::class, 'update'])->name('produtos.update');
    Route::delete('/delete', [ProdutosController::class, 'destroy'])->name('produtos.destroy');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/store', [ClientesController::class, 'create'])->name('clientes.store');
    Route::get('/edit/{id}', [ClientesController::class, 'update'])->name('clientes.edit');
    Route::put('/update/{id}', [ClientesController::class, 'update'])->name('clientes.update');
    Route::delete('/delete', [ClientesController::class, 'destroy'])->name('clientes.destroy');
});

Route::prefix('vendas')->group(function () {
    Route::get('/', [VendaController::class, 'index'])->name('vendas.index');
    Route::get('/create', [VendaController::class, 'create'])->name('vendas.create');
    Route::post('/store', [VendaController::class, 'create'])->name('vendas.store');
});

