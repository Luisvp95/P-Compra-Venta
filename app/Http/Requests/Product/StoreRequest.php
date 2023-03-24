<?php

namespace App\Http\Requests\Product;

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

            'name'=>'required|string|unique:products|max:255',
            'imagen'=>'nullable|file|image|mimes:png,jpg|max:2048',
            'sell_price'=>'required',
            'category_id'=>'required',
            'provider_id'=>'required'
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Este campo es requerido.',
            'name.string'=>'El valor no es correcto.',
            'name.unique'=>'El producto ya está registrado.',
            'name.max'=>'Solo se permite 255 caracteres.',

            'imagen.image'=>'La imagen tiene que ser jpge o png..',
            'imagen.max'=>'El tamaño de la imagen no puede ser superior a 2 MB.',
            'imagen.required'=>'Este campo es requerido',
            //'image.dimensions'=>'Solo se permiten imagenes de 100x200 px.',

            'sell_price.required'=>'Este campo es requerido',

            'category_id.required'=>'Este campo es requerido',

            'provider_id.required'=>'Este campo es requerido',
        ];
    }
}
