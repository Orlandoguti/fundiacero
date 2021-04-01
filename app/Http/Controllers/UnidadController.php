<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Unidad;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $unidads = Unidad::orderBy('id', 'desc')->paginate(5);
        }
        else{
            $unidads = Unidad::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(5);
        }
        

        return [
            'pagination' => [
                'total'        => $unidads->total(),
                'current_page' => $unidads->currentPage(),
                'per_page'     => $unidads->perPage(),
                'last_page'    => $unidads->lastPage(),
                'from'         => $unidads->firstItem(),
                'to'           => $unidads->lastItem(),
            ],
            'unidads' => $unidads
        ];
    }

    public function selectUnidad(Request $request){
        if (!$request->ajax()) return redirect('/');
        $unidads = Unidad::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'asc')->get();
        return ['unidads' => $unidads];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $unidad = new Unidad();
        $unidad->nombre = $request->nombre;
        $unidad->descripcion = $request->descripcion;
        $unidad->encargado = $request->encargado;
        $unidad->condicion = '1';
        $unidad->save();
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $unidad = Unidad::findOrFail($request->id);
        $unidad->nombre = $request->nombre;
        $unidad->descripcion = $request->descripcion;
        $unidad->encargado = $request->encargado;
        $unidad->condicion = '1';
        $unidad->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $unidad = Unidad::findOrFail($request->id);
        $unidad->condicion = '0';
        $unidad->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $unidad = Unidad::findOrFail($request->id);
        $unidad->condicion = '1';
        $unidad->save();
    }

    
}
