{{-- Extends da Index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
    </div>
    <div>
        <form action="{{ route('clientes.index') }}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button class="btn btn-bd-primary btn-sm">Pesquisar</button>
            <a type="button" href="{{ route('produtos.create') }}" class="btn btn-success float-end">Incluir Clientes</a>
        </form>
        <div class="table-responsive mt-4 small">
            @if ($clientes->isEmpty())
                <p> Não existe dados de Clientes </p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Endereço</th>
                            <th>Logradouro</th>
                            <th>CEP</th>
                            <th>Bairro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->endereco }}</td>
                                <td>{{ $cliente->logradouro }}</td>
                                <td>{{ $cliente->cep }}</td>
                                <td>{{ $cliente->bairro }}</td>
                                <td>
                                    <a type="buttton" class="btn btn-outline-warning btn-sm"
                                        href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <a type="buttton" class="btn btn-outline-danger btn-sm"
                                        onclick="deleteRegisterIndex( '{{ route('clientes.destroy') }} ', {{ $cliente->id }} )">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $clientes->appends(request()->query())->onEachSide(0)->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
