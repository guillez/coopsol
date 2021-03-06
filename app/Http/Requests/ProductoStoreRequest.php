<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProductoStoreRequest extends FormRequest
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
            'descripcion'=>'required',
            'monto'=>'required',
            'unidad'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required'=>'Es obligatorio poner la descripcion.',
            'monto.required'=>'Es obligatorio monto.',
            'unidad.required'=>'Es obligatorio unidad'
            
        ];


}


}
