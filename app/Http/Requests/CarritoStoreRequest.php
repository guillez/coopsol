<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Menorque;

class CarritoStoreRequest extends FormRequest
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
            'usuario_id'=>'required',
            'canasta_id'=>'required',
            'producto_id'=>'required',
            'cantidad'=>'menorque'
        ];
    }


 public function messages()
    {
        return [
            'usuario_id.required'=>'Deve estar identificado, cierre la pagina y vuelva a ingresar.',
            'canasta_id.required'=>'Debe tener una reserva confirmada para poder realizar la compra.',
            'producto_id.required'=>'No se ha seleccionado producto',
            'cantidad.menorque'=>'Ha excedido el valor de compra.'
        ];


    }




}
