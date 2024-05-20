<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestCliente extends FormRequest
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
                'nome' =>'required|max:255',
                'email' =>'required|unique:clientes,email|max:255',
                'cep' =>'max:9',
            ];
        }

        if ($this->method() == "PUT") {
            $request = [
                'nome' =>'required|max:255',
                'email' =>'required|max:255',
                'cep' =>'max:9',
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
            'nome.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo valor é obrigatório',
            'email.unique' => 'Este produto já está cadastrado',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres',
            'email.max' => 'O campo email deve ter no máximo 255 caracteres',
            'cep.max' => 'O campo cep deve ter no máximo 9 caracteres',
        ];
    }
}
