<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

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

    public function destroy($id) {
        $produto = $this->produto->find($id);
        $produto->delete();
        return redirect()->route('produtos.index');
    }
}
