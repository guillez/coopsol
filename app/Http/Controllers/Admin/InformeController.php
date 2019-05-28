<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Persona;
use App\User;
use Illuminate\Support\Facades\Auth;

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

}
