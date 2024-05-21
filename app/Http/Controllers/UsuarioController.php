<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\FormRequestUser;

class UsuarioController extends Controller
{
    protected $usuario;
    //Constructor buscando o model Usuario
    public function __construct(User $usuario) {
        $this->usuario = $usuario;
    }

    //
    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $usuarios = $this->usuario->getUsuariosPesquisarIndex(search: $pesquisar);
        return view('usuarios.index', compact('usuarios'));
    }

    public function destroy(Request $request) {
        $usuario = $this->usuario->find($request->id);
        $usuario->delete();
        Toastr::warning('Usuário deletado com sucesso.', 'SISTEMA GESTÃO');
        return response()->json(['success' => true], 200);
    }

    public function create(FormRequestUser $request) {
        if ($request->method() == "POST") {
            $data = $request->all();
            $data['password'] =  \Hash::make($data['password']);
            $usuario = $this->usuario->create($data);

            if ($usuario) {
                Toastr::success('Usuário inserido com sucesso.', 'SISTEMA GESTÃO');
                return redirect()->route('usuarios.index')->with('success', 'Usuário inserido com sucesso.');
            } else {
                Toastr::error('Falha ao inserir o produto.', 'SISTEMA GESTÃO');
                return redirect()->route('usuarios.create')->with('error', 'Falha ao inserir o usuário.');
            }
        };

        return view('usuarios.create');
    }

    public function update(FormRequestUser $request, $id) {
        $usuario = $this->usuario->find($id);

        if ($request->method() == "PUT") {

            if (!$usuario) {
                return redirect()->route('usuarios.index')->with('error', 'Usuário não encontrado.');
            }
            $data = $request->all();
            $data['password'] =  \Hash::make($data['password']);

            if ($usuario->update($data)) {
                Toastr::success('Usuário atualizado com sucesso.', 'SISTEMA GESTÃO');
                return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso.');
            } else {
                Toastr::error('Falha ao atualizar o usuário.', 'SISTEMA GESTÃO');
                return redirect()->route('usuarios.edit', $id)->with('error', 'Falha ao atualizar o usuário.');
            }
        };

        return view('usuarios.edit', compact('usuario'));
    }
}
