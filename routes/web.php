<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});

// Rotas de autenticação
require __DIR__.'/auth.php';

// Protegendo rotas com middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
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
        Route::get('/envia-email/{id}', [VendaController::class, 'enviaEmail'])->name('vendas.envia-email');
    });

    Route::prefix('usuarios')->group(function () {
        Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('/create', [UsuarioController::class, 'create'])->name('usuarios.create');
        Route::post('/store', [UsuarioController::class, 'create'])->name('usuarios.store');
        Route::get('/edit/{id}', [UsuarioController::class, 'update'])->name('usuarios.edit');
        Route::put('/update/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
        Route::delete('/delete', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    });
});
