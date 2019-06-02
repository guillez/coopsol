<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compra;
use App\Canasta;
use App\User;
use App\Carrito;
use App\Producto;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
			->where('canastas.activa', '=', '1')
			->where('compras.confirmada', '=', '1')
			->where('compras.usuario_id', '=', auth()->user()->id )
                        ->select('compras.monto as montototal')
                        ->get();

	$monto_total='No se confirmo la reserva!!';
       foreach($canastas as $canasta){
	$monto_total=$canasta->montototal.' $';
       // $canasta_id=$canasta->cid;
	}
        
      $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
			->where('canastas.activa', '=', '1')
			->where('compras.confirmada', '=', '1')
			->where('compras.usuario_id', '=', auth()->user()->id )
                        ->select('compras.canasta_id as cid')
                        ->get();

	
       foreach($canastas as $canasta){
	
        $canasta_id=$canasta->cid;
	}
        $monto_acumulado=0;

	if(count($canastas)==0)  $canasta_id = 0;

       $carritos = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)
			->where('usuario_id', '=', auth()->user()->id )->paginate(50);
       $montocantidad=0;
       foreach($carritos as $carrito){
	
        $montocantidad=$montocantidad+$carrito->montocantidad;
	}
	$monto_acumulado=$montocantidad;
	$resto=0;
	//$resto=$montototal-montoacumulado;

        return view('admin.carritos.index', compact('carritos','canasta_id','monto_total','monto_acumulado','resto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /* $canastas = Canasta::orderBy('id','ASC')->pluck('descripcion','id');

	$controlcanasta= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
                                 ->where('canastas.activa', '=', '1')
                                 ->select('canastas.id as cid')
                                 ->get();

	$canastas = Canasta::orderBy('id','ASC')->where('canastas.activa', '=', '1')->pluck('descripcion','id');

	if(count($controlcanasta)>0)  $canastas = '';*/
$canasta_id=1;













 $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
                                 ->where('canastas.activa', '=', '1')->where('compras.confirmada', '=', '1')->where('compras.usuario_id', '=', auth()->user()->id )
                                 ->select('compras.monto as montototal')
                                 ->get();


       $monto_total=0;
       foreach($canastas as $canasta){
	$monto_total=$canasta->montototal;
	}



      $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
			->where('canastas.activa', '=', '1')
			->where('compras.confirmada', '=', '1')
			->where('compras.usuario_id', '=', auth()->user()->id )
                        ->select('compras.canasta_id as cid')
                        ->get();

	
       foreach($canastas as $canasta){
	
        $canasta_id=$canasta->cid;
	}
        $monto_acumulado=0;
	if(count($canastas)==0)  $canasta_id = '';

       $carritos = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)
			->where('usuario_id', '=', auth()->user()->id )->paginate(50);
       $montocantidad=0;
       foreach($carritos as $carrito){
	
        $montocantidad=$montocantidad+$carrito->montocantidad;
	}
	$monto_acumulado=$montocantidad;
	$resto=$monto_total-$monto_acumulado;


          $productos = Producto::where('canasta_id', $canasta_id)->where('monto', '<=', $resto)->get()->pluck('descripcion', 'id');
        //$productos = Producto::pluck('descripcion_completa', 'id');

        $cantidades=array(1 => '1 Unidad', 2=> '2 Unidades', 3=> '3 Unidades', 4=> '4 Unidades', 5=> '5 Unidades', 6=> '6 Unidades', 7=> '7 Unidades', 8=> '8 Unidades', 9=> '9 Unidades', 10=> '10 Unidades', 11=> '11 Unidades', 12=> '12 Unidades');



 $carritos1 = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)->where('usuario_id', '=', auth()->user()->id )->paginate(50);

 //$carrito=$carritos1;

$carrito = Carrito::orderBy('id', 'DESC')->paginate(50);
 


      //  return view('admin.carritos.edit', compact('carrito','productos', 'canasta_id', 'cantidades','carritos1'));






$canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
                                 ->where('canastas.activa', '=', '1')->where('compras.confirmada', '=', '1')->where('compras.usuario_id', '=', auth()->user()->id )
                                 ->select('compras.monto as montototal')
                                 ->get();
       $monto_total=0;
       foreach($canastas as $canasta){
	$monto_total=$canasta->montototal;
	}



      $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
			->where('canastas.activa', '=', '1')
			->where('compras.confirmada', '=', '1')
			->where('compras.usuario_id', '=', auth()->user()->id )
                        ->select('compras.canasta_id as cid')
                        ->get();

	
       foreach($canastas as $canasta){
	
        $canasta_id=$canasta->cid;
	}
        $monto_acumulado=0;
	if(count($canastas)==0)  $canasta_id = '';

       $carritos = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)
			->where('usuario_id', '=', auth()->user()->id )->paginate(50);
       $montocantidad=0;
       foreach($carritos as $carrito){
	
        $montocantidad=$montocantidad+$carrito->montocantidad;
	}
	$monto_acumulado=$montocantidad;
	$resto=$monto_total-$monto_acumulado;





        return view('admin.carritos.create', compact('carrito','productos', 'canasta_id', 'cantidades','carritos1','monto_total','monto_acumulado', 'resto'));


       // return view('admin.carritos.create', compact('productos', 'canasta_id', 'cantidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cantidades=$request->cantidad;
        $producto_id=$request->producto_id;

	$productos = Producto::orderBy('id','ASC')->where('id', '=', $producto_id)->select('monto')->get();
	foreach($productos as $producto){
         	$monto=$producto->monto;

        }
	$monto_cantidad=$cantidades*$monto;

      $request->request->add(['montounitario' => $monto ]);
      $request->request->add(['montocantidad' => $monto_cantidad ]);
      $request->request->add(['montoacumulado' => 0]);
       $request->request->add(['fechacarga' => date('Y-m-d')]);



   $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
                                 ->where('canastas.activa', '=', '1')->where('compras.confirmada', '=', '1')->where('compras.usuario_id', '=', auth()->user()->id )
                                 ->select('compras.monto as montototal')
                                 ->get();



        $monto_total=0;
       foreach($canastas as $canasta){
	$monto_total=$canasta->montototal;
	}










      $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
			->where('canastas.activa', '=', '1')
			->where('compras.confirmada', '=', '1')
			->where('compras.usuario_id', '=', auth()->user()->id )
                        ->select('compras.canasta_id as cid')
                        ->get();

	
       foreach($canastas as $canasta){
	
        $canasta_id=$canasta->cid;
	}
        $monto_acumulado=0;
	if(count($canastas)==0)  $canasta_id = '';

       $carritos = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)
			->where('usuario_id', '=', auth()->user()->id )->paginate(50);
       $montocantidad=0;
       foreach($carritos as $carrito){
	
        $montocantidad=$montocantidad+$carrito->montocantidad;
	}
	$monto_acumulado=$montocantidad;
	$resto_nuevo=$monto_total-($monto_acumulado+($request->cantidad*$monto));

      if($resto_nuevo>=0) {
      //se guarda 
      $carritos = Carrito::create($request->all());

	}



     $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
			->where('canastas.activa', '=', '1')
			->where('compras.confirmada', '=', '1')
			->where('compras.usuario_id', '=', auth()->user()->id )
                        ->select('compras.canasta_id as cid')
                        ->get();

	
       foreach($canastas as $canasta){
	
        $canasta_id=$canasta->cid;
	}
        $monto_acumulado=0;
	if(count($canastas)==0)  $canasta_id = '';

       $carritos = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)
			->where('usuario_id', '=', auth()->user()->id )->paginate(50);
       $montocantidad=0;
       foreach($carritos as $carrito){
	
        $montocantidad=$montocantidad+$carrito->montocantidad;
	}
	$monto_acumulado=$montocantidad;
	$resto=$monto_total-$monto_acumulado;









 $productos = Producto::where('canasta_id', $canasta_id)->where('monto', '<=', $resto)->get()->pluck('descripcion', 'id');
//$productos = Producto::where('canasta_id', $canasta_id)->get()->pluck('descripcion', 'id');


       $carritos = Carrito::orderBy('id', 'DESC')->paginate(50);


 $carritos1 = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)
			->where('usuario_id', '=', auth()->user()->id )->paginate(50);

$cantidades=array(1 => '1 Unidad', 2=> '2 Unidades', 3=> '3 Unidades', 4=> '4 Unidades', 5=> '5 Unidades', 6=> '6 Unidades', 7=> '7 Unidades', 8=> '8 Unidades', 9=> '9 Unidades', 10=> '10 Unidades', 11=> '11 Unidades', 12=> '12 Unidades');

        return view('admin.carritos.create', compact('carrito','productos', 'canasta_id','cantidades','carritos1','monto_total','monto_acumulado','resto'));



     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 	
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrito = Carrito::find($id)->delete();

       // return back()->with('info','Producto Eliminado del la Compra');
$canasta_id=1;



 $canastas= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
                                 ->where('canastas.activa', '=', '1')->where('compras.confirmada', '=', '1')->where('compras.usuario_id', '=', auth()->user()->id )
                                 ->select('compras.monto as montototal')
                                 ->get();
$monto_total=0;
       foreach($canastas as $canasta){
	$monto_total=$canasta->montototal;
	}
       $carritos = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)
			->where('usuario_id', '=', auth()->user()->id )->paginate(50);
       $montocantidad=0;
       foreach($carritos as $carrito){
	
        $montocantidad=$montocantidad+$carrito->montocantidad;
	}
	$monto_acumulado=$montocantidad;
	$resto=$monto_total-$monto_acumulado;

 $productos = Producto::where('canasta_id', $canasta_id)->where('monto', '<=', $resto)->get()->pluck('descripcion', 'id');
         // $productos = Producto::where('canasta_id', $canasta_id)->get()->pluck('descripcion', 'id');
        //$productos = Producto::pluck('descripcion_completa', 'id');

        $cantidades=array(1 => '1 Unidad', 2=> '2 Unidades', 3=> '3 Unidades', 4=> '4 Unidades', 5=> '5 Unidades', 6=> '6 Unidades', 7=> '7 Unidades', 8=> '8 Unidades', 9=> '9 Unidades', 10=> '10 Unidades', 11=> '11 Unidades', 12=> '12 Unidades');



 $carritos1 = Carrito::orderBy('id', 'DESC')->where('canasta_id', '=', $canasta_id)->where('usuario_id', '=', auth()->user()->id )->paginate(50);

 //$carrito=$carritos1;

$carrito = Carrito::orderBy('id', 'DESC')->paginate(50);
 


      //  return view('admin.carritos.edit', compact('carrito','productos', 'canasta_id', 'cantidades','carritos1'));






        return view('admin.carritos.create', compact('carrito','productos', 'canasta_id', 'cantidades','carritos1','monto_total','monto_acumulado', 'resto'));




    }
}
