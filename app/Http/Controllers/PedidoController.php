<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Pedido;
use App\DetallePedido;
use App\User;
use App\Notifications\NotifyAdmin;
 
class PedidoController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $buscar = $request->buscar;
        $criterio = $request->criterio;
         
        if ($buscar==''){
            $pedidos = Pedido::join('categorias','pedidos.idcategoria','=','categorias.id')
            ->join('users','pedidos.idusuario','=','users.id')
            ->select('pedidos.id','pedidos.solicitante','pedidos.serie_comprobante','pedidos.created_at',
            'pedidos.estado','categorias.nombre','users.usuario')
            ->orderBy('pedidos.id', 'desc')->paginate(3);
        }
        else{
            $pedidos = Pedido::join('categorias','pedidos.idcategoria','=','categorias.id')
            ->join('users','pedidos.idusuario','=','users.id')
            ->select('pedidos.id','pedidos.solicitante','pedidos.serie_comprobante','pedidos.created_at',
            'pedidos.estado','categorias.nombre','users.usuario')
            ->where('pedidos.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('pedidos.id', 'desc')->paginate(3);
        }
         
        return [
            'pagination' => [
                'total'        => $pedidos->total(),
                'current_page' => $pedidos->currentPage(),
                'per_page'     => $pedidos->perPage(),
                'last_page'    => $pedidos->lastPage(),
                'from'         => $pedidos->firstItem(),
                'to'           => $pedidos->lastItem(),
            ],
            'pedidos' => $pedidos
        ];
    }
    public function num(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
         
            $pedidos = Pedido::join('categorias','pedidos.idcategoria','=','categorias.id')
            ->join('users','pedidos.idusuario','=','users.id')
            ->select('pedidos.id','pedidos.solicitante','pedidos.serie_comprobante','pedidos.created_at',
            'pedidos.estado','categorias.nombre','users.usuario')
            ->orderBy('pedidos.id', 'desc')->paginate(1);     
        return ['pedidos' => $pedidos];
    }
    public function obtenerCabecera(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
        $pedido = Pedido::join('categorias','pedidos.idcategoria','=','categorias.id')
        ->join('users','pedidos.idusuario','=','users.id')
        ->select('pedidos.id','pedidos.solicitante','pedidos.serie_comprobante','pedidos.created_at',
        'pedidos.estado','categorias.nombre','users.usuario')
        ->where('pedidos.id','=',$id)
        ->orderBy('pedidos.id', 'desc')->take(1)->get();
         
        return ['pedido' => $pedido];
    }
    public function obtenerDetalles(Request $request){
        if (!$request->ajax()) return redirect('/');
 
        $id = $request->id;
        $detalles = DetallePedido::join('unidads','detalle_pedidos.idunidad','=','unidads.id')
        ->select('detalle_pedidos.producto','detalle_pedidos.cantidad','detalle_pedidos.medida','detalle_pedidos.detallep',
        'unidads.nombre as nombre_unidad')
        ->where('detalle_pedidos.idpedido','=',$id)
        ->orderBy('detalle_pedidos.id', 'desc')->get();
         
        return ['detalles' => $detalles];
    }
    public function pdf(Request $request,$id){
        $pedido = Pedido::join('categorias','pedidos.idcategoria','=','categorias.id')
        ->join('users','pedidos.idusuario','=','users.id')
        ->select('pedidos.id','pedidos.solicitante','pedidos.serie_comprobante','pedidos.created_at',
        'pedidos.estado','categorias.nombre')
        ->where('pedidos.id','=',$id)
        ->orderBy('pedidos.id','desc')->take(1)->get();

        $detalles = DetallePedido::join('unidads','detalle_pedidos.idunidad','=','unidads.id')
        ->select('detalle_pedidos.cantidad','detalle_pedidos.medida','detalle_pedidos.detallep','detalle_pedidos.producto',
        'unidads.nombre as nombre_unidad')
        ->where('detalle_pedidos.idpedido','=',$id)
        ->orderBy('detalle_pedidos.id','desc')->get();

        $numpedido=Pedido::select('solicitante')->where('id',$id)->get();

        $pdf = \PDF::loadView('pdf.pedido',['pedido'=>$pedido,'detalles'=>$detalles]);
        return $pdf->download('pedido -'.$numpedido[0]->nombre.'.pdf');

    }
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        try{
            DB::beginTransaction();
 
            $mytime= Carbon::now('America/La_Paz');
 
            $pedido = new Pedido();
            $pedido->idcategoria = $request->idcategoria;
            $pedido->idusuario = \Auth::user()->id;
            $pedido->solicitante = $request->solicitante;
            $pedido->serie_comprobante = $request->serie_comprobante;
            $pedido->fecha_hora = $mytime->toDateTimeString();
            $pedido->estado = '1';
            $pedido->save();
 
            $detalles = $request->data;//Array de detalles
            //Recorro todos los elementos
 
            foreach($detalles as $ep=>$det)
            {
                $detalle = new DetallePedido();
                $detalle->idpedido = $pedido->id;
                $detalle->medida = $det['medida'];
                $detalle->cantidad = $det['cantidad'];
                $detalle->detallep = $det['detallep'];
                $detalle->producto = $det['producto'];
                $detalle->fecha_hora = $mytime->toDateTimeString();           
                $detalle->save();
            }          
            $fechaActual= date('Y-m-d H:i:s');
            $numPedidos = DB::table('pedidos')->whereDate('created_at',$fechaActual)->count();
            $numIngresos = DB::table('ingresos')->whereDate('created_at',$fechaActual)->count();

            $arreglosDatos = [
                'pedidos' => [
                            'numero' => $numPedidos,
                            'msj' => 'Pedidos'
                        ],
                'ingresos' => [
                            'numero' => $numIngresos,
                            'msj' => 'Ingresos'
                ]
            ];
            $allUsers = User::all();

            foreach ($allUsers as $notificar){
                User::findOrFail($notificar->id)->notify(new NotifyAdmin($arreglosDatos));
            }
            DB::commit();
            return [
                'id'=> $pedido->id
            ];
        } catch (Exception $e){
            DB::rollBack();
        }
    }
 
    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $pedido = Pedido::findOrFail($request->id);
        $pedido->estado = '0';
        $pedido->save();
    }
}