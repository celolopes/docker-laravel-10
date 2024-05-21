@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vendas Cadastradas</h5>
                    <p class="card-text">Total de Vendas cadastradas no sistema.</p>
                    <div>
                        <!-- Canvas para o gráfico -->
                        <canvas id="myChart"></canvas>
                        <!-- Passando os dados de vendas para o JavaScript -->
                        <script>
                            var vendasData = @json($vendas);
                        </script>
                    </div>
                    <a href="{{ route('vendas.index') }}" class="btn btn-primary">Vendas: {{ $totalDeVendas }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clientes Cadastrados</h5>
                    <p class="card-text">Total de Clientes cadastrados no sistema.</p>
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Clientes: {{ $totalDeClientes }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuário Cadastrados</h5>
                    <p class="card-text">Total de Usuário cadastrados no sistema.</p>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Usuários: {{ $totalDeUsuarios }}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produtos Cadastrados</h5>
                    <p class="card-text">Total de Produtos cadastrados no sistema.</p>
                    <a href=" {{ route('produtos.index') }} " class="btn btn-primary">Produtos: {{ $totalDeProdutos }}</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
@endsection
