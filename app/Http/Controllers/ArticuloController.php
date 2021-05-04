<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
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
        
        $cont=Articulo::count();
        return [
            'pagination' => [
                'total'        => $articulos->total(),
                'current_page' => $articulos->currentPage(),
                'per_page'     => $articulos->perPage(),
                'last_page'    => $articulos->lastPage(),
                'from'         => $articulos->firstItem(),
                'to'           => $articulos->lastItem(),
            ],
            'articulos' => $articulos,'cont'=>$cont
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
    public function listarArticuloPedido(Request $request)
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

    public function listarPdfarea1(){
        $articulos = DB::select('SELECT a.idcategoria, ca.nombre as nombre_categoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=1
        GROUP BY a.idcategoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        ORDER BY (a.idcategoria) ASC');


        $count=DB::select('SELECT COUNT(a.condicion) AS totalproductos 
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=1
        GROUP BY a.idcategoria');
     
        $fechaActual= date('Y-m-d');

        $pdf = \PDF::loadView('pdf.productosareapdf',['articulos'=>$articulos,'count'=>$count]);
        return $pdf->download($fechaActual.'.pdf');
    }
    public function listarPdfarea2(){
        $articulos = DB::select('SELECT a.idcategoria, ca.nombre as nombre_categoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=2
        GROUP BY a.idcategoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        ORDER BY (a.idcategoria) ASC');


        $count=DB::select('SELECT COUNT(a.condicion) AS totalproductos 
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=2
        GROUP BY a.idcategoria');
     
        $fechaActual= date('Y-m-d');

        $pdf = \PDF::loadView('pdf.productosareapdf',['articulos'=>$articulos,'count'=>$count]);
        return $pdf->download($fechaActual.'.pdf');
    }
    public function listarPdfarea3(){
        $articulos = DB::select('SELECT a.idcategoria, ca.nombre as nombre_categoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=3
        GROUP BY a.idcategoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        ORDER BY (a.idcategoria) ASC');


        $count=DB::select('SELECT COUNT(a.condicion) AS totalproductos 
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=3
        GROUP BY a.idcategoria');
     
        $fechaActual= date('Y-m-d');

        $pdf = \PDF::loadView('pdf.productosareapdf',['articulos'=>$articulos,'count'=>$count]);
        return $pdf->download($fechaActual.'.pdf');
    }
    public function listarPdfarea4(){
        $articulos = DB::select('SELECT a.idcategoria, ca.nombre as nombre_categoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=4
        GROUP BY a.idcategoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        ORDER BY (a.idcategoria) ASC');


        $count=DB::select('SELECT COUNT(a.condicion) AS totalproductos 
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=4
        GROUP BY a.idcategoria');
     
        $fechaActual= date('Y-m-d');

        $pdf = \PDF::loadView('pdf.productosareapdf',['articulos'=>$articulos,'count'=>$count]);
        return $pdf->download($fechaActual.'.pdf');
    }
    public function listarPdfarea5(){
        $articulos = DB::select('SELECT a.idcategoria, ca.nombre as nombre_categoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=5
        GROUP BY a.idcategoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        ORDER BY (a.idcategoria) ASC');


        $count=DB::select('SELECT COUNT(a.condicion) AS totalproductos 
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=5
        GROUP BY a.idcategoria');
     
        $fechaActual= date('Y-m-d');

        $pdf = \PDF::loadView('pdf.productosareapdf',['articulos'=>$articulos,'count'=>$count]);
        return $pdf->download($fechaActual.'.pdf');
    }
    public function listarPdfarea6(){
        $articulos = DB::select('SELECT a.idcategoria, ca.nombre as nombre_categoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=6
        GROUP BY a.idcategoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        ORDER BY (a.idcategoria) ASC');


        $count=DB::select('SELECT COUNT(a.condicion) AS totalproductos 
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=6
        GROUP BY a.idcategoria');
     
        $fechaActual= date('Y-m-d');

        $pdf = \PDF::loadView('pdf.productosareapdf',['articulos'=>$articulos,'count'=>$count]);
        return $pdf->download($fechaActual.'.pdf');
    }
    public function listarPdfarea7(){
        $articulos = DB::select('SELECT a.idcategoria, ca.nombre as nombre_categoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=7
        GROUP BY a.idcategoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        ORDER BY (a.idcategoria) ASC');


        $count=DB::select('SELECT COUNT(a.condicion) AS totalproductos 
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=7
        GROUP BY a.idcategoria');
     
        $fechaActual= date('Y-m-d');

        $pdf = \PDF::loadView('pdf.productosareapdf',['articulos'=>$articulos,'count'=>$count]);
        return $pdf->download($fechaActual.'.pdf');
    }
    public function listarPdfarea8(){
        $articulos = DB::select('SELECT a.idcategoria, ca.nombre as nombre_categoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=8
        GROUP BY a.idcategoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        ORDER BY (a.idcategoria) ASC');


        $count=DB::select('SELECT COUNT(a.condicion) AS totalproductos 
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=8
        GROUP BY a.idcategoria');
     
        $fechaActual= date('Y-m-d');

        $pdf = \PDF::loadView('pdf.productosareapdf',['articulos'=>$articulos,'count'=>$count]);
        return $pdf->download($fechaActual.'.pdf');
    }
    public function listarPdfarea9(){
        $articulos = DB::select('SELECT a.idcategoria, ca.nombre as nombre_categoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=9
        GROUP BY a.idcategoria,a.nombre,a.codigo,a.stock,a.marca,a.descripcion,a.created_at
        ORDER BY (a.idcategoria) ASC');


        $count=DB::select('SELECT COUNT(a.condicion) AS totalproductos 
        FROM articulos as a 
        JOIN categorias as ca 
        WHERE ca.id = a.idcategoria AND a.idcategoria=9
        GROUP BY a.idcategoria');
     
        $fechaActual= date('Y-m-d');

        $pdf = \PDF::loadView('pdf.productosareapdf',['articulos'=>$articulos,'count'=>$count]);
        return $pdf->download($fechaActual.'.pdf');
    }

    public function listarPdf(){
        $articulos = Articulo::join('categorias','articulos.idcategoria','=','categorias.id')
        ->join('unidads','articulos.idunidad','=','unidads.id')
        ->join('tiempos','articulos.idtiempo','=','tiempos.id')
        ->join('estados','articulos.idestado','=','estados.id')
        ->select('articulos.id','articulos.idcategoria','articulos.idunidad','articulos.idtiempo','articulos.idestado','articulos.codigo','articulos.nombre','categorias.nombre as nombre_categoria','unidads.nombre as nombre_unidad','tiempos.nombre as nombre_tiempo','estados.nombre as nombre_estado','articulos.stock','articulos.tiempo','articulos.descripcion','articulos.marca','articulos.imagen','articulos.condicion','articulos.created_at')
        ->orderBy('categorias.id','articulos.created_at', 'desc')->get();
        $fechaActual= date('Y-m-d');
        $cont=Articulo::count();

        $pdf = \PDF::loadView('pdf.productospdf',['articulos'=>$articulos,'cont'=>$cont]);
        return $pdf->download($fechaActual.'.pdf');
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
    public function buscarArticuloPedido(Request $request ){
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

