<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'email'=>'required|email|string|max:255|unique:providers,email,'. $this->route('provider')->id.'|max:255',
            'ci'=>'required|string|max:10|min:10|unique:providers,ci,'. $this->route('provider')->id.'|max:10',
            'address'=>'nullable|string|max:255',
            'phone'=>'required|string|max:10|min:10|unique:providers,phone,'. $this->route('provider')->id.'|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permite 255 caracteres',

            'email.required'=>'Este campo es requerido',
            'email.email'=>'No es un correo valido',
            'email.string'=>'El valor no es correcto',
            'email.max'=>'Solo se permite 255 caracteres',
            'email.unique'=>'Ya se encuentra registrado',

            'ci.required'=>'Este campo es requerido',
            'ci.string'=>'El valor no es correcto',
            'ci.max'=>'Solo se permiten 10 caracteres',
            'ci.min'=>'Se requiere de 10 caracteres',
            'ci.unique'=>'Ya se encuentra registrado',

            'address.string'=>'El valor no es correcto',
            'address.max'=>'Solo se permite 255 caracteres',

            'phone.required'=>'Este campo es requerido',
            'phone.string'=>'El valor no es correcto',
            'phone.max'=>'Solo se permiten 10 caracteres',
            'phone.min'=>'Se requiere de 10 caracteres',
            'phone.unique'=>'Ya se encuentra registrado',
        ];
    }
}
