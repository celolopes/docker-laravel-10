<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

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
    Route::post('/store', [ProdutosController::class,'store'])->name('produtos.store');
    Route::get('/edit/{id}', [ProdutosController::class, 'edit'])->name('produtos.edit');
    Route::post('/update/{id}', [ProdutosController::class, 'update'])->name('produtos.update');
    Route::delete('/delete/{id}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');
});
