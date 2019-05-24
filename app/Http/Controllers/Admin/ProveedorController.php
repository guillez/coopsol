<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProveedorStoreRequest;
use App\Http\Requests\ProveedorUpdateRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Proveedor;

class ProveedorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $proveedors = Proveedor::orderBy('id', 'DESC')->paginate();
       // $posts = Post::orderBy('id', 'DESC')->where('user_id',auth()->user()->id)->paginate();
       // dd($posts);
        return view('admin.proveedors.index', compact('proveedors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   return view('admin.proveedors.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(proveedorstoreRequest $request)
    {
        $proveedor = Proveedor::create($request->all());
        return redirect()->route('proveedors.edit', $proveedor->id)->with('info','Entidad Aseguradora Guardada con Exito');
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
        $proveedor = Proveedor::find($id);
       
        return view('admin.proveedors.edit', compact('proveedor'));
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
        $proveedor = Proveedor::find($id);
        $proveedor->fill($request->all())->save();
        return redirect()->route('proveedors.edit', $proveedor->id)->with('info','Entidad Aseguradora Actualizada con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id)->delete();
        return back()->with('info','Etiqueta Eliminada');
    }
}
