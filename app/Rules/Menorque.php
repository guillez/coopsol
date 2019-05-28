<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Compra;
use App\Canasta;
use App\User;
use App\Carrito;
use App\Producto;

class Menorque implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
	// obtengo el monto reservado
      $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
			->where('canastas.activa', '=', '1')
			->where('compras.confirmada', '=', '1')
			->where('compras.usuario_id', '=', auth()->user()->id )
                        ->select('compras.monto as montototal')
                        ->get();

       foreach($canastas as $canasta){
	$monto_reservado=$canasta->montototal;
	}
      // sumo to lo comprado y lo guardo en $valorcomprado
$carritos = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)->where('usuario_id', '=', auth()->user()->id )->select('(sum(montocantidad) as valorcomprado')
                        ->get();
       foreach($carritos as $carrito){
	$valor_comprado=$carrito->valorcomprado;
	}


	// comparo si al sumar el $valorcomprado + $value  no excede al $monto_reservado 
	$nueva_campra= $valor_comprado+$value;
	if($nueva_campra<=$monto_reservado) return true else return false;
       
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No puede agregar porque supera el monto de compra reservado.';
    }
}
