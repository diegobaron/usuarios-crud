<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255', 'unique:users,email,'.$this->user?->id ?? 'NULL'],
        ];
        if(!$this->user) {
            $rules['email'][0] = ['required'];
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }
        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Informe um nome.',
            'name.string' => 'O nome deve ser do tipo string',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',
            'email.required' => 'Informe um email.',
            'email.email' => 'Email inválido.',
            'email.max' => 'O email deve ter no máximo 255 caracteres.',
            'email.unique' => 'Email já existe.',
            'password.required' => 'Informe uma senha.',
            'password.string' => 'A senha deve ser do tipo string',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ];
    }

}
