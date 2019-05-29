<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CanastaStoreRequest;
use App\Http\Requests\CanastaUpdateRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Canasta;

class CanastaController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $canastas = Canasta::orderBy('id', 'DESC')->paginate();
       // $posts = Post::orderBy('id', 'DESC')->where('user_id',auth()->user()->id)->paginate();
       // dd($posts);
        return view('admin.canastas.index', compact('canastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   return view('admin.canastas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(canastastoreRequest $request)
    {
        $canasta = Canasta::create($request->all());
        return redirect()->route('canastas.edit', $canasta->id)->with('info','Entidad Aseguradora Guardada con Exito');
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
        $canasta = Canasta::find($id);
       
        return view('admin.canastas.edit', compact('canasta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeguroUpdateRequest $request, $id)
    {
        $canasta = Canasta::find($id);
        $canasta->fill($request->all())->save();
        return redirect()->route('canastas.edit', $canasta->id)->with('info','Entidad Aseguradora Actualizada con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $canasta = Canasta::find($id)->delete();
        return back()->with('info','Etiqueta Eliminada');
    }


    public function imprimircan()
    {
	$canastas = Canasta::select('*')->where('canasta_id', '1')->get();
        //->where('alumnoactivo', 1)
        view()->share('canastas',$canastas);//VARIABLE GLOBAL PRODUCTOS

        $pdf = PDF::loadView('imprimircan');//CARGO LA VISTA
        return $pdf->download('formulario');//SUGERIR NOMBRE A DESCARGAR

    }


    public function enviar($id) 
    {
        $usuarios = User::select('*')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->whereIn('role_id', ['1','3','4','5'])
            ->get();
            
        foreach ($usuarios as $usuario) {
            $my_destination[] = $usuario->email;
        }

        if ($my_destination) {
            $actividad =  $this->registros->find($id);

            Mail::send('actividades.actividad', ['actividad' => $actividad], function ($message) use ($my_destination)
                {
                    $message->from('tramitesextension@ucu.edu.ar', 'AELF-UCU: Sistema Extensión');
                    $message->to($my_destination);
                    $message->subject('UCUEXT: Actividad presentada');
                }
            );
        }
    } 

}
