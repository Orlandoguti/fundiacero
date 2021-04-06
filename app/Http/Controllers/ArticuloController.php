<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
            ->orderBy('categorias.id', 'asc')->paginate(7);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion')
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
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.imagen','articulos.condicion')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.imagen','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        

        return ['articulos' => $articulos];
    }
    public function listarArticuloVenta(Request $request)
    {
        if (!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.imagen','articulos.condicion')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        else{
            $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
            ->join('unidads','articulos.idunidad','=','unidads.id')
            ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.imagen','articulos.condicion')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('articulos.stock','>','0')
            ->orderBy('articulos.id', 'desc')->paginate(10);
        }
        

        return ['articulos' => $articulos];
    }
    public function listarPdf(){
        $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
        ->join('unidads','articulos.idunidad','=','unidads.id')
        ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.imagen','articulos.condicion')
        ->orderBy('articulos.nombre', 'desc')->get();

        $cont=Articulo::count();

        $pdf = \PDF::loadView('pdf.articulospdf',['articulos'=>$articulos,'cont'=>$cont]);
        return $pdf->download('articulos.pdf');
    }
    public function buscarArticulo(Request $request ){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('nombre','=', $filtro)
        ->select('id', 'nombre')->orderBy('nombre', 'asc')->take(1)->get();

        return ['articulos' => $articulos];
    }
    public function buscarArticuloVenta(Request $request ){
        if (!$request->ajax()) return redirect('/');

        $filtro = $request->filtro;
        $articulos = Articulo::where('codigo','=', $filtro)
        ->select('id', 'nombre','stock','precio_venta')
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
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->imagen = $request->imagen;
        $articulo->condicion = '1';
        $articulo->save();
        
    }
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->idcategoria = $request->idcategoria;
        $articulo->idunidad = $request->idunidad;
        $articulo->codigo = $request->codigo;
        $articulo->nombre = $request->nombre;
        $articulo->precio_venta = $request->precio_venta;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
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
