<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;

class ProdutosController extends Controller
{
    protected $produto;
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    public function index(Request $request) {

        $pesquisar = $request->pesquisar;
        $produtos = $this->produto->getProdutosPesquisarIndex(search: $pesquisar);
        return view('produtos.index', compact('produtos'));
    }

    public function destroy(Request $request) {
        $produto = $this->produto->find($request->id);
        $produto->delete();
        return response()->json(['success' => true], 200);
    }

    public function create(FormRequestProduto $request) {
        if ($request->method() == "POST") {
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            $produto = $this->produto->create($data);

            if ($produto) {
                return redirect()->route('produtos.index');
            } else {
                return redirect()->route('produtos.create');
            }
        };

        return view('produtos.create');
    }
}
