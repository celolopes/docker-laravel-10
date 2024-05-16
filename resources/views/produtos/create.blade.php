@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Adicionar Produto</h1>
    </div>
    <form class="row g-3" method="POST" action="{{ route('produtos.store') }}">
    @csrf
        <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input id="mascara_nome" value="{{old('nome')}}" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @if ($errors->has('nome'))
                <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
            @endif
        </div>
        <div class="col-md-6">
            <label class="form-label">Valor</label>
            <input id="mascara_valor" value="{{old('valor')}}" class="form-control @error('valor') is-invalid @enderror" name="valor">
            @if ($errors->has('nome'))
                <div class="invalid-feedback">{{ $errors->first('valor') }}</div>
            @endif
        </div>
        <div class="col-12">
            <a type="button" href="{{ route('produtos.index') }}" class="btn btn-outline-primary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
@endsection
