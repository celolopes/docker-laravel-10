@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Criar nova Venda</h1>
    </div>
    <form class="row g-3" method="POST" action="{{ route('vendas.store') }}">
    @csrf
        <input type="hidden" name="numero_da_venda" value="{{$numero_da_venda}}">
        <div class="col-md-6">
            <label class="form-label">Numeração</label>
            <input id="mascara_nome" value="{{$numero_da_venda}}" type="text" class="form-control @error('numero_da_venda') is-invalid @enderror" name="numero_da_venda" disabled>
            @error('numero_da_venda')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="md-3">
            <label for="" class="form-label">Produto</label>
            <select class="form-select" name="produto_id">
                <option selected>Clique para selecionar</option>
                @foreach($findProduto as $produto)
                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="md-3">
            <label for="" class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id">
                <option selected>Clique para selecionar</option>
                @foreach($findCliente as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <a type="button" href="{{ route('vendas.index') }}" class="btn btn-outline-primary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
@endsection
