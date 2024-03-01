<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'cpf' => 'required|string|min:11|max:11',
            'phone' => 'required|string|min:11|max:11',
            'address' => 'required|string|min:3|max:255',
            'cep' => 'required|string|min:8|max:8',
            'city' => 'required|string|min:3|max:255',
            'district' => 'required|string|min:3|max:255',
            'uf' => 'required|string|min:2|max:2',
            'number' => 'required|string|min:1|max:10',
            'complement' => 'required|string|max:255',
            'reference' => 'nullable|string|max:255',
        ];
    }
}
