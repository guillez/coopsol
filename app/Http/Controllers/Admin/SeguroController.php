<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SeguroStoreRequest;
use App\Http\Requests\SeguroUpdateRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seguro;

class SeguroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $seguros = Seguro::orderBy('id', 'DESC')->paginate();
       // $posts = Post::orderBy('id', 'DESC')->where('user_id',auth()->user()->id)->paginate();
       // dd($posts);
        return view('admin.seguros.index', compact('seguros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   return view('admin.seguros.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeguroStoreRequest $request)
    {
        $seguro = Seguro::create($request->all());
        return redirect()->route('seguros.edit', $seguro->id)->with('info','Entidad Aseguradora Guardada con Exito');
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
        $seguro = Seguro::find($id);
       
        return view('admin.seguros.edit', compact('seguro'));
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
        $seguro = Seguro::find($id);
        $seguro->fill($request->all())->save();
        return redirect()->route('seguros.edit', $seguro->id)->with('info','Entidad Aseguradora Actualizada con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seguro = Seguro::find($id)->delete();
        return back()->with('info','Etiqueta Eliminada');
    }
}
