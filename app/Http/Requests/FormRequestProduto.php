<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestProduto extends FormRequest
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
                'nome' =>'required|unique:produtos,nome|max:255',
                'valor' =>'required',
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
            'valor.required' => 'O campo valor é obrigatório',
            'nome.unique' => 'Este produto já está cadastrado',
            'nome.max' => 'O campo nome deve ter no máximo 255 caracteres',
        ];
    }
}
