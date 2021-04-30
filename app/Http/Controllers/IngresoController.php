<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Ingreso;
use App\DetalleIngreso;
use App\User;
use App\Notifications\NotifyAdmin;
 
class IngresoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $ingresos = Ingreso::join('categorias','ingresos.idcategoria','=','categorias.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.detalle','ingresos.serie_comprobante','ingresos.tipo_comprobante','ingresos.fecha_hora',
            'ingresos.estado','categorias.nombre','users.usuario')
            ->orderBy('ingresos.id', 'desc')->paginate(5);
        }
        else{
            $ingresos = Ingreso::join('categorias','ingresos.idcategoria','=','categorias.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.detalle','ingresos.serie_comprobante','ingresos.tipo_comprobante','ingresos.fecha_hora',
            'ingresos.estado','categorias.nombre','users.usuario')
            ->where('ingresos.'.$criterio, 'like', '%'. $buscar . '%')->orderBy('ingresos.id', 'desc')->paginate(3);
        }
         
        return [
            'pagination' => [
                'total'        => $ingresos->total(),
                'current_page' => $ingresos->currentPage(),
                'per_page'     => $ingresos->perPage(),
                'last_page'    => $ingresos->lastPage(),
                'from'         => $ingresos->firstItem(),
                'to'           => $ingresos->lastItem(),
            ],
            'ingresos' => $ingresos
        ];
    }
    public function num(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $ingresos = Ingreso::join('categorias','ingresos.idcategoria','=','categorias.id')
            ->join('users','ingresos.idusuario','=','users.id')
            ->select('ingresos.id','ingresos.detalle','ingresos.serie_comprobante','ingresos.tipo_comprobante','ingresos.fecha_hora',
            'ingresos.estado','categorias.nombre','users.usuario')
            ->orderBy('ingresos.id', 'desc')->paginate(1);
        }
         
        return [
            'pagination' => [
                'total'        => $ingresos->total(),
                'current_page' => $ingresos->currentPage(),
                'per_page'     => $ingresos->perPage(),
                'last_page'    => $ingresos->lastPage(),
                'from'         => $ingresos->firstItem(),
                'to'           => $ingresos->lastItem(),
            ],
            'ingresos' => $ingresos
        ];
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
         

        $ingreso = Ingreso::join('categorias','ingresos.idcategoria','=','categorias.id')
        ->join('users','ingresos.idusuario','=','users.id')
        ->select('ingresos.id','ingresos.detalle','ingresos.serie_comprobante','ingresos.tipo_comprobante','ingresos.fecha_hora',
        'ingresos.estado','categorias.nombre','users.usuario')
        ->where('ingresos.id','=',$id)
        ->orderBy('ingresos.id', 'desc')->take(1)->get();

         
        return [
           
            'ingreso' => $ingreso
        ];
    }
    public function obtenerDetalles(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
         
        $detalles = DetalleIngreso::join('articulos','detalle_ingresos.idarticulo','=','articulos.id')
        ->select('detalle_ingresos.cantidad','articulos.nombre as articulo','articulos.idunidad as nombre_unidad')
        ->where('detalle_ingresos.idingreso','=',$id)
        ->orderBy('detalle_ingresos.id', 'desc')->get();

         
        return [
           
            'detalles' => $detalles
        ];
    }
    public function pdf(Request $request,$id){
        $ingreso = Ingreso::join('categorias','ingresos.idcategoria','=','categorias.id')
        ->join('users','ingresos.idusuario','=','users.id')
        ->select('ingresos.id','ingresos.detalle','ingresos.tipo_comprobante','ingresos.serie_comprobante',
        'ingresos.fecha_hora',
        'ingresos.estado','categorias.nombre','users.usuario')
        ->where('ingresos.id','=',$id)
        ->orderBy('ingresos.id','desc')->take(1)->get();

        $detalles = DetalleIngreso::join('articulos','detalle_ingresos.idarticulo','=','articulos.id')
        ->select('detalle_ingresos.cantidad',
        'articulos.nombre as articulo')
        ->where('detalle_ingresos.idingreso','=',$id)
        ->orderBy('detalle_ingresos.id','desc')->get();

        $numingreso=Ingreso::select('fecha_hora')->where('id',$id)->get();

        $pdf = \PDF::loadView('pdf.ingreso',['ingreso'=>$ingreso,'detalles'=>$detalles]);
        return $pdf->download('ingreso-'.$numingreso[0]->num_comprobante.'.pdf');

    }
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        
        try{
            DB::beginTransaction();
 
            $mytime= Carbon::now('America/La_Paz');
 
            $ingreso = new Ingreso();
            $ingreso->idcategoria=$request->get('idcategoria');
            $ingreso->idusuario = \Auth::user()->id;
            $ingreso->detalle = $request->detalle;
            $ingreso->serie_comprobante = $request->serie_comprobante;
            $ingreso->tipo_comprobante = $request->tipo_comprobante;
            $ingreso->detalle = $request->detalle;
            $ingreso->fecha_hora = $mytime->toDateTimeString();
            $ingreso->estado = '1';
            $ingreso->save();
 
            $detalles = $request->data;//Array de detalles
            //Recorro todos los elementos
 
            foreach($detalles as $ep=>$det)
            {
                $detalle = new DetalleIngreso();
                $detalle->idingreso = $ingreso->id;
                $detalle->idarticulo = $det['idarticulo'];
                $detalle->cantidad = $det['cantidad']; 
                $detalle->fecha_hora = $mytime->toDateTimeString();      
                $detalle->save();
            }          
            $fechaActual= date('Y-m-d');
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
        } catch (Exception $e){
            DB::rollBack();
        }
    }
 
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $ingreso = Ingreso::findOrFail($request->id);
        $ingreso->estado = '0';
        $ingreso->save();
    }
}