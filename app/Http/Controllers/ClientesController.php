<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormRequestCliente;
use App\Models\Cliente;
use Toastr;

class ClientesController extends Controller
{
    protected $cliente;
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    public function index(Request $request)
    {

        $pesquisar = $request->pesquisar;
        $clientes = $this->cliente->getClientesPesquisarIndex(search: $pesquisar);
        return view('clientes.index', compact('clientes'));
    }

    public function destroy(Request $request)
    {
        $cliente = $this->cliente->find($request->id);
        $cliente->delete();
        Toastr::warning('Cliente deletado com sucesso.', 'SISTEMA GESTÃO');
        return response()->json(['success' => true], 200);
    }

    public function create(FormRequestCliente $request)
    {
        if ($request->method() == "POST") {
            $data = $request->all();
            $cliente = $this->cliente->create($data);

            if ($cliente) {
                Toastr::success('Cliente inserido com sucesso.', 'SISTEMA GESTÃO');
                return redirect()->route('clientes.index')->with('success', 'Cliente inserido com sucesso.');
            } else {
                Toastr::error('Falha ao inserir o cliente.', 'SISTEMA GESTÃO');
                return redirect()->route('clientes.create')->with('error', 'Falha ao inserir o cliente.');
            }
        };
        return view('clientes.create');
    }

    public function update(FormRequestCliente $request, $id)
    {
        $cliente = $this->cliente->find($id);

        if ($request->method() == "PUT") {

            if (!$cliente) {
                return redirect()->route('clientes.index')->with('error', 'Cliente não encontrado.');
            }
            $data = $request->all();

            if ($cliente->update($data)) {
                Toastr::success('Cliente atualizado com sucesso.', 'SISTEMA GESTÃO');
                return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso.');
            } else {
                Toastr::error('Falha ao atualizar o cliente.', 'SISTEMA GESTÃO');
                return redirect()->route('clientes.edit', $id)->with('error', 'Falha ao atualizar o cliente.');
            }
        };

        return view('clientes.edit', compact('cliente'));
    }
}
