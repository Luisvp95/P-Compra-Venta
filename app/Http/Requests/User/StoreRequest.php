<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users|max:50|email:rfc,dns',
            'password' => 'required|string|min:8|max:50|',
            'roles' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido.',
            'name.string' => 'El valor no es correcto.',
            'name.max' => 'Solo se permite 255 caracteres.',

            'email.required' => 'El correo electrónico es requerido.',
            'email.string' => 'El valor no es correcto.',
            'email.unique' => 'El correo ya está registrado.',
            'email.max' => 'Solo se permite 50 caracteres.',
            'email.email' => 'No es un correo electronico.',

            'password.required' => 'La contraseña es requerido.',
            'password.string' => 'El valor no es correcto.',
            'password.max' => 'La contraseña tiene mas 50 caracteres.',
            'password.min' => 'La contraseña tiene menos de 8 caracteres.',

            'roles.required' => 'El rol es requerido.',
        ];
    }
}
