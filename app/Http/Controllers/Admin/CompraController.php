<?php


namespace App\Http\Controllers\Admin;
use App\Http\Requests\CompraStoreRequest;
use App\Http\Requests\CompraUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Compra;
use App\Canasta;
use App\User;
use App\Carrito;

use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$controlcanasta= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
                                 ->where('canastas.activa', '=', '1')->where('compras.usuario_id', '=', auth()->user()->id )
                                 ->select('canastas.id as cid')
                                 ->get();
       if(count($controlcanasta)>0)  $canastas = '';

       $compras = Compra::orderBy('id', 'ASC')->where('compras.usuario_id', '=', auth()->user()->id )->paginate();

        return view('admin.compras.index', compact('compras','controlcanasta','canastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $canastas = Canasta::orderBy('id','ASC')->pluck('descripcion','id');

	$controlcanasta= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
                                 ->where('canastas.activa', '=', '1')->where('compras.usuario_id', '=', auth()->user()->id )
                                 ->select('canastas.id as cid')
                                 ->get();

	$canastas = Canasta::orderBy('id','ASC')->where('canastas.activa', '=', '1')->pluck('descripcion','id');

	if(count($controlcanasta)>0)  $canastas = '';

        return view('admin.compras.create', compact('canastas','usuario_id','controlcanasta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompraStoreRequest $request)
    {

       $canastas = Canasta::orderBy('id','ASC')->where('canastas.activa', '=', '1')->select('monto')->get();

	foreach($canastas as $canasta){
          $monto_canasta=$canasta->monto;

        }
        $cantidad_canastas=$request->cantidad;
	$total_pagar=$cantidad_canastas*$monto_canasta;

      $request->request->add(['monto' => $total_pagar]);
      $compra = Compra::create($request->all());

      //$compra1 = Compra::find($compra->id);
    //  $compra1->monto(1000); 
    //  $compra1->save;

       // $actividad->fill($request->all())->save();


/*        $actividad_id = $request->get('actividad');

        $request->request->add(['actividad_id' => $actividad_id]);

       $ingreso = Ingreso::find($id);        
        $ingreso->fill($request->all())->save();

        $actividad_id=$request->input('actividad');

*/
      return redirect()->route('reservas.index', $compra->id)->with('info','Reserva Guardada con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $controlcanasta= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
                                 ->where('canastas.activa', '=', '1')
                                 ->select('canastas.id as cid')
                                 ->get();
     if(count($controlcanasta)>0)  $canastas = '';

     $compra = Compra::find($id);

     $compra->confirmada = 1;

     $compra->save();

       
        //return view('admin.compras.index', compact('compra','canastas','controlcanasta'));
        return redirect()->route('reservas.index', $compra->id)->with('info','Reserva Guardada con Exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compra = Compra::find($id);
        
        $canastas = Canasta::orderBy('id','ASC')->pluck('descripcion','id');

        return view('admin.compras.edit', compact('compra','canastas'));
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

      $controlcanasta= Compra::join('canastas', 'compras.canasta_id', '=', 'canastas.id')
                                 ->where('canastas.activa', '=', '1')
                                 ->select('canastas.id as cid')
                                 ->get();
     if(count($controlcanasta)>0)  $canastas = '';

     $compra = Compra::find($id);

     $canastas = Canasta::orderBy('id','ASC')->where('canastas.activa', '=', '1')->select('monto')->get();

	foreach($canastas as $canasta){
          $monto_canasta=$canasta->monto;
        }

        $cantidad_canastas=$request->cantidad;

	$total_pagar=$cantidad_canastas*$monto_canasta;

        $request->request->add(['monto' => $total_pagar]);
  
        $compra->fill($request->all())->save();

        $canastas = Canasta::orderBy('id','ASC')->pluck('descripcion','id');

        //return view('admin.compras.index', compact('compra','canastas','controlcanasta'));
        return redirect()->route('reservas.index', $compra->id)->with('info','Reserva Guardada con Exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }



}
