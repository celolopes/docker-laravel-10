@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar Usuário</h1>
    </div>
    <form class="row g-3" method="POST" action="{{ route('usuarios.update', ['id' => $usuario->id]) }}">
    @csrf
    @method('PUT')
        <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input id="mascara_nome" value="{{ old('name', $usuario->name) }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">E-mail</label>
            <input id="mascara_email" value="{{ old('email', $usuario->email) }}" type="text" class="form-control @error('email') is-invalid @enderror" name="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Nova Senha</label>
            <input type="password" id="mascara_password" class="form-control @error('password') is-invalid @enderror" name="password">
            @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
            @endif
        </div>
        <div class="col-12">
            <a type="button" href="{{ route('usuarios.index') }}" class="btn btn-outline-primary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
@endsection
