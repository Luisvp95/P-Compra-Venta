<?php

namespace App\Http\Requests\Busines;

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
            'description'=> 'required|string|max:255',
            'email'=> 'required|max:50|email:rfc,dns',
            'address'=> 'required|max:100|',
            'nic'=> 'required|numeric',
            'logo'=> 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.max'=>'Solo se permite 255 caracteres.',

            'description.required'=>'Este campo es requerido.',
            'description.string'=>'El valor no es correcto.',
            'description.max'=>'Solo se permite 255 caracteres.',

            'email.max'=>'Solo se permite 50 caracteres.',
            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electronico.',

            'address.required'=>'Este campo es requerido.',
            'address.max'=>'Solo se permite 100 caracteres.',

            'nic.required'=>'Este campo es requerido.',
            'nic.numeric'=>'El campo no debes contener caracteres no numéricos.',

            //'image.required'=>'Este campo es requerido',
            //'image.dimensions'=>'Solo se permiten imagenes de 100x200 px.',
        ];
    }
}
