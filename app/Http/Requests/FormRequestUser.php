<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestUser extends FormRequest
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
                'name' =>'required|unique:users,name|max:255',
                'email' =>'required',
                'password' =>'required',
            ];
        }

        if ($this->method() == "PUT") {
            $request = [
                'name' =>'required|max:255',
                'email' =>'required',
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
            'name.required' => 'O campo nome é obrigatório',
            'password.required' => 'O campo password é obrigatório',
            'name.unique' => 'Este Usuário já está cadastrado',
            'name.max' => 'O campo nome deve ter no máximo 255 caracteres',
            'email.required' => 'O campo email é obrigatório',
        ];
    }
}
