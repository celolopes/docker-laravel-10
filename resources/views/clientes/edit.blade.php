@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Atualizar Cliente</h1>
    </div>
    <form class="row g-3" method="POST" action="{{ route('clientes.update', ['id' => $cliente->id]) }}">
    @csrf
    @method('PUT')
        <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input id="mascara_nome" value="{{ old('nome', $cliente->nome) }}" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome">
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">E-mail</label>
            <input value="{{ old('email', $cliente->email) }}" class="form-control @error('email') is-invalid @enderror" name="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label class="form-label">CEP</label>
            <input id="cep" value="{{ old('cep', $cliente->cep) }}" class="form-control @error('cep') is-invalid @enderror" name="cep">
            @error('cep')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-12">
            <label class="form-label">Endereço</label>
            <input id="endereco" value="{{ old('endereco', $cliente->endereco) }}" class="form-control @error('endereco') is-invalid @enderror" name="endereco">
            @error('endereco')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Logradouro</label>
            <input id="logradouro" value="{{ old('logradouro', $cliente->logradouro) }}" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro">
            @error('logradouro')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Bairro</label>
            <input id="bairro" value="{{ old('bairro', $cliente->bairro) }}" class="form-control @error('bairro') is-invalid @enderror" name="bairro">
            @error('bairro')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-12">
            <a type="button" href="{{ route('clientes.index') }}" class="btn btn-outline-primary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
@endsection
