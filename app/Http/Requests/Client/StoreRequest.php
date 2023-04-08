<?php

namespace App\Http\Requests\Client;

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

            'name'=>'required|string|max:255',
            'ci'=>'nullable|numeric|unique:clients|digits_between:6,10',
            'address'=>'nullable|string|max:255',
            'phone' => 'nullable|numeric|unique:clients|digits:8',
            'email'=>'nullable|string|unique:clients|max:50|email:rfc,dns',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permite 255 caracteres.',

            'ci.required'=>'Este campo es requerido.',
            'ci.numeric'=>'El campo no debes contener caracteres no numéricos.',
            'ci.unique'=>'El carnet ya está registrado.',
            'ci.digits_between'=>'El campo debe tener entre 6 y 10 dígitos.',

            'address.required'=>'Este campo es requerido.',
            'address.string'=>'El valor no es correcto.',
            'address.max'=>'Solo se permite 255 caracteres.',

            'phone.required'=>'Este campo es requerido.',
            'phone.unique'=>'El telefono ya está registrado.',
            'phone.digits'=>'El campo debe tener exactamente 8 dígitos.',
            'phone.numeric'=>'El campo no debe contener caracteres no numéricos.',
            
            'email.required'=>'Este campo es requerido.',
            'email.string'=>'El valor no es correcto.',
            'email.unique'=>'El correo ya está registrado.',
            'email.max'=>'Solo se permite 50 caracteres.',
            'email.email'=>'No es un correo electronico.',

        ];
    }
}
