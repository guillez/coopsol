<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Canasta;
use App\Carrito;
use App\Producto;
use App\User;
use Illuminate\Support\Facades\Auth;

use Mail;

use PDF;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informealumnos()
    {
	$personas = Persona::select('id', 'apellido', 'nombre', 'documento')->where('alumno_sedes', '1')->where('alumnoactivo', 1)->take(1000)->get();
        
        view()->share('personas',$personas);//VARIABLE GLOBAL PRODUCTOS

        $pdf = PDF::loadView('imprimirinformealumnos');//CARGO LA VISTA
        return $pdf->download('formulario');//SUGERIR NOMBRE A DESCARGAR

    }

    public function imprimircan()
    {

            $my_destination[] = "ingguillermoz@gmail.com";  

           // $personas =  Persona::orderBy('id', 'DESC')->find(22); //$this->personas->find(22);


       $canastas = Canasta::orderBy('id', 'DESC')->where('activa', '=', 1)->get();


       foreach($canastas as $canasta){
	
        $canasta_id=$canasta->id;
	}
	//$carritos = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)->get();	
        //$canastas = Carrito::join('*')->where('canasta_id', '=' ,$canasta_id)->where('usuario_id', '=', auth()->user()->id)->get();
   
        $carritos = Carrito::join('productos', 'carritos.producto_id', '=', 'productos.id')->join('users', 'carritos.usuario_id', '=', 'users.id')->join('canastas', 'canastas.id', '=', 'carritos.canasta_id')->where('carritos.canasta_id', '=', $canasta_id)->where('carritos.usuario_id', '=', auth()->user()->id ) ->select('productos.descripcion as producto','productos.monto as monto','productos.proveedor_id as pid','productos.unidad as unidad','carritos.cantidad as cantidad','users.name as nombre','users.email as email')->orderBy('productos.descripcion')->get();

          /*  Mail::send('imprimircan', ['carritos' => $carritos], function ($message) use ($my_destination)
                {
                    $message->from('ingguillermoz@gmail.com', 'Prueba');
                    $message->to($my_destination);
                    $message->subject('Prueba1');
                }
            );
*/
        view()->share('carritos',$carritos);//VARIABLE GLOBAL PRODUCTOS

        $pdf = PDF::loadView('imprimircan');//CARGO LA VISTA
        return $pdf->download('compra_personal.pdf');//SUGERIR NOMBRE A DESCARGAR

    }


   public function informemensual()
    {


       $canastas = Canasta::orderBy('id', 'DESC')->where('activa', '=', 1)->get();

       foreach($canastas as $canasta){
	
        $canasta_id=$canasta->id;
	}

   
$carritos = DB::table('carritos')->join('productos', 'carritos.producto_id', '=', 'productos.id')->select(DB::raw('sum(carritos.cantidad) as cantidad, productos.descripcion, productos.monto, productos.unidad, productos.proveedor_id as pid'))->where('carritos.anulado' ,'=', '2')->groupBy('carritos.producto_id')->orderBy('productos.descripcion')->get();

/*
$carritos = DB::table('carritos')->join('productos', 'carritos.producto_id', '=', 'productos.id')->join('canastas', 'canastas.id', '=', 'carritos.canasta_id')->join('compras', 'compras.canasta_id', '=', 'carritos.canasta_id')->select(DB::raw('sum(carritos.cantidad) as cantidad, productos.descripcion, productos.monto, productos.unidad, productos.proveedor_id as pid'))->where('compras.confirmada','=', 3)->where('carritos.canasta_id' ,'=',$canasta_id)->where('compras.usuario_id' ,'=','carritos.usuario_id')->groupBy('carritos.producto_id')->orderBy('productos.descripcion')->get();

$carritos = DB::table('carritos')->join('productos', 'carritos.producto_id', '=', 'productos.id')->join('canastas', 'canastas.id', '=', 'carritos.canasta_id')->join('compras', 'compras.canasta_id', '=', 'carritos.canasta_id')->select(DB::raw('sum(carritos.cantidad) as cantidad, productos.descripcion, productos.monto, productos.unidad, productos.proveedor_id as pid'))->where('compras.confirmada','=', 3)->where('carritos.canasta_id' ,'=',$canasta_id)->where('compras.usuario_id' ,'=','carritos.usuario_id')->groupBy('carritos.producto_id')->orderBy('productos.descripcion')->get();

select sum(carritos.cantidad) as cantidad, productos.descripcion, productos.monto, productos.unidad, productos.proveedor_id as pid 
from `carritos` 
inner join `productos` on `carritos`.`producto_id` = `productos`.`id` 
inner join `canastas` on `canastas`.`id` = `carritos`.`canasta_id` 
inner join `compras` on `compras`.`canastas_id` = `carritos`.`canasta_id` 
where (`carritos`.`canasta_id` = `1` and `compras`.`confirmada` = `3`) 
group by `productos`.`id` 
order by `productos`.`descripcion` asc;


$query = DB::table("persons")->select("persons.name", "protocols.text")
    ->leftjoin("protocols", function ($join) {
        $join->on("persons.id", "=", "protocols.personId");
        $join->where("protocols.id", ">", 10);
    });
    ->get();
*/
     /*   $carritos = Carrito::join('productos', 'carritos.producto_id', '=', 'productos.id')->join('users', 'carritos.usuario_id', '=', 'users.id')->where('carritos.canasta_id', '=', $canasta_id)->select('productos.descripcion as producto','carritos.cantidad as cantidad','users.name as nombre','users.email as email')->groupBy('productos.id')->get();
*/

        view()->share('carritos',$carritos);//VARIABLE GLOBAL PRODUCTOS

        $pdf = PDF::loadView('informemensual');//CARGO LA VISTA
        return $pdf->download('informe_mensual.pdf');//SUGERIR NOMBRE A DESCARGAR

    }

    public function compras()
    {
	$personas = Persona::select('id', 'apellido', 'nombre', 'documento')->where('alumno_sedes', '1')->where('alumnoactivo', 1)->take(1000)->get();
        
        view()->share('personas',$personas);//VARIABLE GLOBAL PRODUCTOS

        $pdf = PDF::loadView('imprimirinformealumnos');//CARGO LA VISTA
        return $pdf->download('formulario');//SUGERIR NOMBRE A DESCARGAR

    }
}
