<?php

namespace App\Http\Requests\Report;

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
            'fecha_ini'=>'required|date|before_or_equal:'.now()->format('Y-m-d'),
            'fecha_fin'=>'required|date|before_or_equal:'.now()->format('Y-m-d'),
         
        ];
    }
    public function messages()
    {
        return [
            'fecha_ini.required'=>'Ingrese la fecha inicial',
            'fecha_ini.before_or_equal'=>'La fecha debe ser anterior o igual al día actual',
            'fecha_fin.required'=>'Ingrese la fecha inicial',
            'fecha_fin.before_or_equal'=>'La fecha debe ser anterior o igual al día actual',
     
        ];
    }
}
