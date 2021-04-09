<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Crypt;
use App\Articulo;

class ArticuloController extends Controller
{
    
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->join('tiempos','articulos.idtiempo','=','tiempos.id')
            ->join('estados','articulos.idestado','=','estados.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion')
            ->orderBy('categorias.id', 'asc')->paginate(7);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->join('tiempos','articulos.idtiempo','=','tiempos.id')
            ->join('estados','articulos.idestado','=','estados.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('categorias.id', 'asc')->paginate(7);
        }
        

        return [
            'pagination' => [
                'total'        => $articulos->total(),
                'current_page' => $articulos->currentPage(),
                'per_page'     => $articulos->perPage(),
                'last_page'    => $articulos->lastPage(),
                'from'         => $articulos->firstItem(),
                'to'           => $articulos->lastItem(),
            ],
            'articulos' => $articulos
        ];
    }

    public function listarArticulo(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->join('tiempos','articulos.idtiempo','=','tiempos.id')
            ->join('estados','articulos.idestado','=','estados.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->join('tiempos','articulos.idtiempo','=','tiempos.id')
            ->join('estados','articulos.idestado','=','estados.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        

        return ['articulos' => $articulos];
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
         

        $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
        ->join('unidads','articulos.idunidad','=','unidads.id')
        ->join('tiempos','articulos.idtiempo','=','tiempos.id')
        ->join('estados','articulos.idestado','=','estados.id')
        ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion')
        ->where('articulos.id','=',$id)
        ->orderBy('articulos.id', 'desc')->take(1)->get();

         
        return [
           
            'articulos' => $articulos
        ];
    }

    public function obtenerDetalles(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
         
        $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
        ->join('unidads','articulos.idunidad','=','unidads.id')
        ->join('tiempos','articulos.idtiempo','=','tiempos.id')
        ->join('estados','articulos.idestado','=','estados.id')
        ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion','articulos.created_at')
        ->where('articulos.id','=',$id)
        ->orderBy('articulos.id', 'desc')->get();

         
        return [
           
            'articulos' => $articulos
        ];
    }
    public function listarArticuloVenta(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->join('tiempos','articulos.idtiempo','=','tiempos.id')
            ->join('estados','articulos.idestado','=','estados.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->join('tiempos','articulos.idtiempo','=','tiempos.id')
            ->join('estados','articulos.idestado','=','estados.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('articulos.stock','>','0')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        

        return ['articulos' => $articulos];
    }
    public function listarPdf(){
        $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
        ->join('unidads','articulos.idunidad','=','unidads.id')
        ->join('tiempos','articulos.idtiempo','=','tiempos.id')
        ->join('estados','articulos.idestado','=','estados.id')
        ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion')
        ->orderBy('articulos.nombre', 'desc')->get();

        $cont=Articulo::count();

        $pdf = \PDF::loadView('pdf.articulospdf',['articulos'=>$articulos,'cont'=>$cont]);
        return $pdf->download('articulos.pdf');
    }
    public function buscarArticulo(Request $request ){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('nombre','=', $filtro)
        ->select('id', 'nombre','codigo')->orderBy('nombre', 'asc')->take(1)->get();

        return ['articulos' => $articulos];
    }
    public function buscarArticuloVenta(Request $request ){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('codigo','=', $filtro)
        ->select('id', 'nombre','stock')
        ->where('stock','>','0')
        ->orderBy('nombre', 'asc')->take(1)->get();

        return ['articulos' => $articulos];
    }
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = new Articulo();
        $articulo->idcategoria = $request->idcategoria;
        $articulo->idunidad = $request->idunidad;
        $articulo->idtiempo = $request->idtiempo;
        $articulo->idestado = $request->idestado;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->stock = $request->stock;
        $articulo->tiempo = $request->tiempo;
        $articulo->descripcion = $request->descripcion;
        $articulo->marca = $request->marca;
        $fileData = $request->file('imagen');
        if(Input::hasfile('imagen')) {
            $fileName = time()."_".$fileData->getClientOriginalName();
            $fileData->move(public_path().'/imagenes/articulos/', $fileName);
            $articulo->imagen = $fileName;
        }
        $articulo->condicion = '1';
        $articulo->save();  
    }
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->idcategoria = $request->idcategoria;
        $articulo->idunidad = $request->idunidad;
        $articulo->idtiempo = $request->idtiempo;
        $articulo->idestado = $request->idestado;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->stock = $request->stock;
        $articulo->tiempo = $request->tiempo;
        $articulo->descripcion = $request->descripcion;
        $articulo->marca = $request->marca;
        $fileData = $request->file('imagen');
        if(Input::hasfile('imagen')) {
            $fileName = time()."_".$fileData->getClientOriginalName();
            $fileData->move(public_path().'/imagenes/articulos/', $fileName);
            $articulo->imagen = $fileName;
        }
        $articulo->condicion = '1';
        $articulo->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '0';
        $articulo->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '1';
        $articulo->save();
    }

}
