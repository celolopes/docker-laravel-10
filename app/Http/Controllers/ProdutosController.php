<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use Toastr;

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
        Toastr::warning('Produto deletado com sucesso.', 'SISTEMA GESTÃO');
        return response()->json(['success' => true], 200);
    }

    public function create(FormRequestProduto $request) {
        if ($request->method() == "POST") {
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            $produto = $this->produto->create($data);

            if ($produto) {
                Toastr::success('Produto inserido com sucesso.', 'SISTEMA GESTÃO');
                return redirect()->route('produtos.index')->with('success', 'Produto inserido com sucesso.');
            } else {
                Toastr::error('Falha ao inserir o produto.', 'SISTEMA GESTÃO');
                return redirect()->route('produtos.create')->with('error', 'Falha ao inserir o produto.');
            }
        };

        return view('produtos.create');
    }

    public function update(FormRequestProduto $request, $id) {
        $produto = $this->produto->find($id);

        if ($request->method() == "PUT") {

            if (!$produto) {
                return redirect()->route('produtos.index')->with('error', 'Produto não encontrado.');
            }
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            if ($produto->update($data)) {
                Toastr::success('Produto atualizado com sucesso.', 'SISTEMA GESTÃO');
                return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso.');
            } else {
                Toastr::error('Falha ao atualizar o produto.', 'SISTEMA GESTÃO');
                return redirect()->route('produtos.edit', $id)->with('error', 'Falha ao atualizar o produto.');
            }
        };

        return view('produtos.edit', compact('produto'));
    }
}
