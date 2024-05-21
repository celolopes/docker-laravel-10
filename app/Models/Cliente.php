<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venda;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'endereco', 'logradouro', 'cep', 'bairro'];

    public function getClientesPesquisarIndex(?string $search = '') {
        $cliente = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', 'like', '%'. $search . '%');
            }
        })->paginate(10);

        return $cliente;
    }

    public function venda() {
        return $this->hasMany(Venda::class);
    }
}
