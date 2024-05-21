<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Produto;

class Venda extends Model
{
    use HasFactory;
    protected $fillable = ['numero_da_venda', 'cliente_id', 'produto_id'];

    public function getVendasPesquisarIndex(?string $search = '') {
        $venda = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('numero_da_venda', 'like', '%'. $search . '%');
            }
        })->orderBy('numero_da_venda', 'desc')->paginate(10);

       return $venda;
    }

    public function getNumeroDaVenda() {
        $numero_da_venda = $this->max('numero_da_venda') + 1;
        return $numero_da_venda;
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function produto() {
        return $this->belongsTo(Produto::class);
    }
}
