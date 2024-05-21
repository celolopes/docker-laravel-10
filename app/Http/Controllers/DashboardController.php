<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Venda;

class DashboardController extends Controller
{
    //
    public function index() {
        $vendas = Venda::with('produto')
        ->select('produto_id', \DB::raw('count(*) as total_vendas'))
        ->groupBy('produto_id')
        ->get()
        ->map(function ($venda) {
            $venda->produto_nome = $venda->produto->nome;
            return $venda;
        });
        $totalDeProdutos = $this->buscaTotalDeProdutos();
        $totalDeClientes = $this->buscaTotalDeClientes();
        $totalDeUsuarios = $this->buscaTotalDeUsuarios();
        $totalDeVendas = $this->buscaTotalDeVendas();
        return view('dashboard.index', compact('totalDeProdutos', 'totalDeClientes', 'totalDeUsuarios', 'totalDeVendas', 'vendas'));
    }

    public function buscaTotalDeProdutos() {
        $totalDeProdutos = Produto::all()->count();
        return $totalDeProdutos;
    }

    public function buscaTotalDeClientes() {
        $totalDeClientes = Cliente::all()->count();
        return $totalDeClientes;
    }

    public function buscaTotalDeUsuarios() {
        $totalDeUsuarios = User::all()->count();
        return $totalDeUsuarios;
    }

    public function buscaTotalDeVendas() {
        $totalDeVendas = Venda::all()->count();
        return $totalDeVendas;
    }
}
