<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Tiempo;

class TiempoController extends Controller
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
            $tiempos = Tiempo::orderBy('id', 'desc')->paginate(5);
        }
        else{
            $tiempos = Tiempo::where($criterio, 'like', '%'. $buscar . '%')->orderBy('id', 'desc')->paginate(5);
        }
        

        return [
            'pagination' => [
                'total'        => $tiempos->total(),
                'current_page' => $tiempos->currentPage(),
                'per_page'     => $tiempos->perPage(),
                'last_page'    => $tiempos->lastPage(),
                'from'         => $tiempos->firstItem(),
                'to'           => $tiempos->lastItem(),
            ],
            'tiempos' => $tiempos
        ];
    }

    public function selectTiempo(Request $request){
        if (!$request->ajax()) return redirect('/');
        $tiempos = Tiempo::where('condicion','=','1')
        ->select('id','nombre')->orderBy('nombre', 'asc')->get();
        return ['tiempos' => $tiempos];
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
        $tiempo = new Tiempo();
        $tiempo->nombre = $request->nombre;
        $tiempo->descripcion = $request->descripcion;
        $tiempo->condicion = '1';
        $tiempo->save();
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
        $tiempo = Tiempo::findOrFail($request->id);
        $tiempo->nombre = $request->nombre;
        $tiempo->descripcion = $request->descripcion;
        $tiempo->condicion = '1';
        $tiempo->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $tiempo = Tiempo::findOrFail($request->id);
        $tiempo->condicion = '0';
        $tiempo->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $tiempo = Tiempo::findOrFail($request->id);
        $tiempo->condicion = '1';
        $tiempo->save();
    }

    
}
