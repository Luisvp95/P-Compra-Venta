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
            'ci'=>'required|string|unique:clients|min:8|max:8',
            'address'=>'required|string|max:255',
            'phone'=>'string|required|unique:clients|min:8|max:8',
            'email'=>'string|required|unique:clients|max:255|email:rfc,dns',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permite 255 caracteres',

            'ci.required'=>'Este campo es requerido',
            'ci.string'=>'El valor no es correcto',
            'ci.unique'=>'El cliente ya está registrado',
            'ci.max'=>'Solo se permite 8 caracteres',
            'ci.min'=>'Se requiere 8 caracteres',

            'address.required'=>'Este campo es requerido',
            'address.string'=>'El valor no es correcto',
            'address.max'=>'Solo se permite 255 caracteres',

            'phone.required'=>'Este campo es requerido',
            'phone.string'=>'El valor no es correcto',
            'phone.unique'=>'El telefono ya está registrado',
            'phone.max'=>'Solo se permite 8 caracteres',
            'phone.min'=>'Se requiere 8 caracteres',
            
            'email.required'=>'Este campo es requerido',
            'email.string'=>'El valor no es correcto',
            'email.unique'=>'El correo ya está registrado',
            'email.max'=>'Solo se permite 255 caracteres',
            'email.email'=>'No es un correo electronico',

        ];
    }
}
