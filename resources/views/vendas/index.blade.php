{{-- Extends da Index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
    </div>
    <div>
        <form action="{{ route('vendas.index') }}" method="get">
            <input type="text" name="pesquisar" id="" placeholder="Digite o número da venda">
            <button class="btn btn-bd-primary btn-sm">Pesquisar</button>
            <a type="button" href="{{ route('vendas.create') }}" class="btn btn-success float-end">Incluir Venda</a>
        </form>
        <div class="table-responsive mt-4 small">
            @if ($vendas->isEmpty())
                <p> Não existe dados de Venda </p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Nº da Venda</th>
                            <th>Cliente</th>
                            <th>Produto</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendas as $venda)
                            <tr>
                                <td>{{ $venda->numero_da_venda }}</td>
                                <td>{{ $venda->cliente->nome }}</td>
                                <td>{{ $venda->produto->nome }}</td>
                                <td>
                                    <a type="button" class="btn btn-light btn-sm" href="{{ route('vendas.envia-email', $venda->id) }}">Enviar E-mail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrapper">
                    {{ $vendas->appends(request()->query())->onEachSide(0)->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
