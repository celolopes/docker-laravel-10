<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto;

class VendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cria 15 clientes
        $clientes = Cliente::factory(15)->create();

        // Cria 15 produtos
        $produtos = Produto::factory(15)->create();

        // Cria 10 vendas, associando a um cliente e produto aleatórios
        Venda::factory(10)->create([
            'cliente_id' => $clientes->random()->id,
            'produto_id' => $produtos->random()->id,
        ]);
    }
}
