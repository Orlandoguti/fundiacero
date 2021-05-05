<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Venta;
use App\DetalleVenta;
use App\User;
use App\Notifications\NotifyAdmin;
 
class VentaController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $ventas = Venta::join('categorias','ventas.idcategoria','=','categorias.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.serie_comprobante',
            'ventas.fecha_hora',
            'ventas.estado','categorias.nombre','users.nombreuser')
            ->orderBy('ventas.id', 'desc')->paginate(3);
        }
        else{
            $ventas = Venta::join('categorias','ventas.idcategoria','=','categorias.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.serie_comprobante',
            'ventas.fecha_hora',
            'ventas.estado','categorias.nombre','users.nombreuser')
            ->where('ventas.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('ventas.id', 'desc')->paginate(3);
        }
         
        return [
            'pagination' => [
                'total'        => $ventas->total(),
                'current_page' => $ventas->currentPage(),
                'per_page'     => $ventas->perPage(),
                'last_page'    => $ventas->lastPage(),
                'from'         => $ventas->firstItem(),
                'to'           => $ventas->lastItem(),
            ],
            'ventas' => $ventas
        ];
    }
    public function num(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $ventas = Venta::join('categorias','ventas.idcategoria','=','categorias.id')
            ->join('users','ventas.idusuario','=','users.id')
            ->select('ventas.id','ventas.serie_comprobante',
            'ventas.fecha_hora',
            'ventas.estado','categorias.nombre','users.usuario')
            ->orderBy('ventas.id', 'desc')->paginate(1);
        }
         
        return [
            'pagination' => [
                'total'        => $ventas->total(),
                'current_page' => $ventas->currentPage(),
                'per_page'     => $ventas->perPage(),
                'last_page'    => $ventas->lastPage(),
                'from'         => $ventas->firstItem(),
                'to'           => $ventas->lastItem(),
            ],
            'ventas' => $ventas
        ];
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
        $venta = Venta::join('categorias','ventas.idcategoria','=','categorias.id')
        ->join('users','ventas.idusuario','=','users.id')
        ->select('ventas.id','ventas.serie_comprobante','ventas.fecha_hora','ventas.estado','categorias.nombre','users.nombreuser')
        ->where('ventas.id','=',$id)
        ->orderBy('ventas.id', 'desc')->take(1)->get();
         
        return ['venta' => $venta];
    }
    public function obtenerDetalles(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
        $detalles = DetalleVenta::join('articulos','detalle_ventas.idarticulo','=','articulos.id')
        ->join('unidads','articulos.idunidad','=','unidads.id')
        ->select('detalle_ventas.cantidad','articulos.nombre as articulo','unidads.nombre as unidad','detalle_ventas.fecha_hora')
        ->where('detalle_ventas.idventa','=',$id)
        ->orderBy('detalle_ventas.id', 'desc')->get();
         
        return ['detalles' => $detalles];
    }
    public function pdf(Request $request,$id){
        $venta = Venta::join('categorias','ventas.idcategoria','=','categorias.id')
        ->join('users','ventas.idusuario','=','users.id')
        ->select('ventas.id','ventas.serie_comprobante',
        'ventas.fecha_hora',
        'ventas.estado','categorias.nombre','users.nombreuser')
        ->where('ventas.id','=',$id)
        ->orderBy('ventas.id','desc')->take(1)->get();

        $detalles = DetalleVenta::join('articulos','detalle_ventas.idarticulo','=','articulos.id')
        ->join('unidads','articulos.idunidad','=','unidads.id')
        ->select('detalle_ventas.cantidad','unidads.nombre as nombre_unidad',
        'articulos.nombre as articulo','detalle_ventas.fecha_hora')
        ->where('detalle_ventas.idventa','=',$id)
        ->orderBy('detalle_ventas.id','desc')->get();

        $numventa=Venta::select('id')->where('id',$id)->get();

        $pdf = \PDF::loadView('pdf.venta',['venta'=>$venta,'detalles'=>$detalles]);
        return $pdf->stream('Despacho Nº'.$numventa[0]->id.':'.$venta[0]->fecha_hora.'.pdf');

    }
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        try{
            DB::beginTransaction();
 
            $mytime= Carbon::now('America/La_Paz');
 
            $venta = new Venta();
            $venta->idcategoria = $request->idcategoria;
            $venta->idusuario = \Auth::user()->id;
            $venta->serie_comprobante = $request->serie_comprobante;
            $venta->fecha_hora = $mytime->toDateTimeString();
            $venta->estado = '1';
            $venta->save();
 
            $detalles = $request->data;//Array de detalles
            //Recorro todos los elementos
 
            foreach($detalles as $ep=>$det)
            {
                $detalle = new DetalleVenta();
                $detalle->idventa = $venta->id;
                $detalle->idarticulo = $det['idarticulo'];
                $detalle->cantidad = $det['cantidad'];   
                $detalle->fecha_hora = $mytime->toDateTimeString();     
                $detalle->save();
            }          
            $fechaActual= date('Y-m-d H:m:s');
            $numVentas = DB::table('ventas')->whereDate('created_at', $fechaActual)->count();
            $numIngresos = DB::table('ingresos')->whereDate('created_at', $fechaActual)->count();
            $numPedidos = DB::table('pedidos')->whereDate('created_at', $fechaActual)->count();


            $arreglosDatos = [
                'ventas' => [
                            'numero' => $numVentas,
                            'msj' => 'Ventas'
                        ],
                'ingresos' => [
                            'numero' => $numIngresos,
                            'msj' => 'Ingresos'
                ],
                'pedidos' => [
                    'numero' => $numPedidos,
                    'msj' => 'Pedidos'
                     ]
            ];
            $allUsers = User::all();

            foreach ($allUsers as $notificar){
                User::findOrFail($notificar->id)->notify(new NotifyAdmin($arreglosDatos));
            }
            DB::commit();
            return [
                'id'=> $venta->id
            ];
        } catch (Exception $e){
            DB::rollBack();
        }
    }
 
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $venta = Venta::findOrFail($request->id);
        $venta->estado = '0';
        $venta->save();
    }
}