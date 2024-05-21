@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuários</h1>
    </div>
    <div>
        <form action="{{ route('usuarios.index') }}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button class="btn btn-bd-primary btn-sm">Pesquisar</button>
            <a type="button" href="{{ route('usuarios.create') }}" class="btn btn-success float-end">Criar Usuário</a>
        </form>
        <div class="table-responsive mt-4 small">
            @if ($usuarios->isEmpty())
                <p> Não existe dados de Usuário </p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    <a type="buttton" class="btn btn-outline-warning btn-sm"
                                        href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <a type="buttton" class="btn btn-outline-danger btn-sm"
                                        onclick="deleteRegisterIndex( '{{ route('usuarios.destroy') }} ', {{ $usuario->id }} )">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $usuarios->appends(request()->query())->onEachSide(0)->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
