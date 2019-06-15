<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Producto;

class ProductoController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $productos = Producto::orderBy('id', 'DESC')->paginate(50);
       // $posts = Post::orderBy('id', 'DESC')->where('user_id',auth()->user()->id)->paginate();
       // dd($posts);
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   //return view('admin.productos.create');
  return view('admin.productos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoStoreRequest $request)
    {

        $request->request->add(['proveedor_id' => 1 ]);
     // $request->request->add(['montocantidad' => $monto_cantidad ]);
    //  $request->request->add(['montoacumulado' => 0]);
    //   $request->request->add(['fechacarga' => date('Y-m-d')]);

        $producto = Producto::create($request->all());




        return redirect()->route('productos.edit', $producto->id)->with('info','Entidad Aseguradora Guardada con Exito');
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
        $producto = Producto::find($id);
       
        return view('admin.productos.edit', compact('producto'));
  //return view('admin.productos.index', compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoUpdateRequest $request, $id)
    {
        $producto = Producto::find($id);
        $producto->fill($request->all())->save();
        return redirect()->route('productos.edit', $producto->id)->with('info','Entidad Aseguradora Actualizada con Exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$producto = Producto::find($id)->delete();
        //return back()->with('info','Etiqueta Eliminada');
  return view('admin.productos.index', compact('productos'));
    }
}
