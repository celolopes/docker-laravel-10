{{-- Extends da Index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>
    <div>
        <form action="{{route('produtos.index')}}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o nome">
            <button>Pesquisar</button>
            <a type="button" href="{{ route('produtos.create') }}" class="btn btn-success float-end">Incluir Produto</a>
        </form>
        <div class="table-responsive mt-4 small">
            @if ($produtos->isEmpty())
                <p> Não existe dados de Produto </p>
            @else
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ 'R$' . ' ' . number_format($produto->valor, 2, ',', '.') }}</td>
                            <td>
                                <a type="buttton" class="btn btn-outline-warning btn-sm" href="#">Editar</a>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <a type="buttton" class="btn btn-outline-danger btn-sm" onclick="deleteRegisterIndex( '{{ route('produtos.destroy') }} ', {{$produto->id}} )">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@endsection
