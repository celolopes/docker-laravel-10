<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestVenda extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $request = [];
        if ($this->method() == "POST") {
            $request = [
                'numero_da_venda' =>'unique:vendas,numero_da_venda|integer',
                'produto_id' =>'required',
                'cliente_id' =>'required',
            ];
        }

        return $request;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
     public function messages(): array
    {
        return [
            'numero_da_venda.unique' => 'Este número da venda já está cadastrado',
            'numero_da_venda.integer' => 'O campo número da venda deve ser um número inteiro',
            'produto_id.required' => 'O campo produto é obrigatório',
            'cliente_id.required' => 'O campo cliente é obrigatório',
        ];
    }
}
