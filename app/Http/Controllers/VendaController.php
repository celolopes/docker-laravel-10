<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Http\Requests\FormRequestVenda;
use App\Models\Produto;
use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr;

class VendaController extends Controller
{

    protected $venda;
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    //
    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $vendas = $this->venda->getVendasPesquisarIndex(search: $pesquisar);
        return view('vendas.index', compact('vendas'));
    }

    public function create(FormRequestVenda $request) {

         // Gerar variável para criar numero da venda com 4 digitos de forma altomática
        $numero_da_venda = $this->venda->getNumeroDaVenda();
        $findProduto = Produto::all();
        $findCliente = Cliente::all();

        if ($request->method() == "POST") {
            $data = $request->all();
            $data['numero_da_venda'] = $numero_da_venda;
            $venda = $this->venda->create($data);

            if ($venda) {
                Toastr::success('Venda inserida com sucesso.', 'SISTEMA GESTÃO');
                return redirect()->route('vendas.index')->with('success', 'Venda inserida com sucesso.');
            } else {
                Toastr::error('Falha ao inserir a venda.', 'SISTEMA GESTÃO');
                return redirect()->route('vendas.create')->with('error', 'Falha ao inserir a venda.');
            }
        };

        return view('vendas.create', compact('numero_da_venda', 'findProduto', 'findCliente'));
    }
}
