<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ProductoUpdateRequest extends FormRequest
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
            'direccion'=>'required',
            'email'=>'required|unique:seguros,email,'.$this->proveedor,
            'telefono'=>'required',
            'celular'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required'=>'Es obligatorio poner la descripcion.',
            'direccion.required'=>'Es obligatorio poner la direccion.',
            'email.required'=>'Es obligatorio poner el email',
            'telefono.required'=>'Es obligatorio poner la telefono fijo.',
            'celular.required'=>'Es obligatorio poner el celular.'
        ];


    }

}
