<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
 
use Illuminate\Http\Request;
 
class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $anio=date('Y');

        $detalle_ingresos=DB::table('detalle_ingresos as di')
        ->select(DB::raw('(di.idingreso) as idingreso'),
        DB::raw('SUM(di.cantidad) as totalc'),
        DB::raw('(di.fecha_hora) as fecha'))
        ->whereYear('di.fecha_hora',$anio)
        ->groupBy(DB::raw('(di.fecha_hora)'),DB::raw('(di.cantidad)'),DB::raw('(di.idingreso)'),DB::raw('(di.id)'))
        ->get();

        $detalle_ventas=DB::table('detalle_ventas as dv')
        ->select(DB::raw('(dv.idventa) as idventa'),
        DB::raw('SUM(dv.cantidad) as totalv'),
        DB::raw('(dv.fecha_hora) as fecha'))
        ->whereYear('dv.fecha_hora',$anio)
        ->groupBy(DB::raw('(dv.fecha_hora)'),DB::raw('(dv.cantidad)'),DB::raw('(dv.idventa)'),DB::raw('(dv.id)'))
        ->get();

       

        $detalle_pedidos=DB::table('detalle_pedidos as dp')
        ->select(DB::raw('(dp.idpedido) as idpedido'),
        DB::raw('(dp.producto) as pro'),
        DB::raw('(dp.fecha_hora) as fecha'),
        DB::raw('(dp.cantidad) as totalp'))
        ->groupBy(DB::raw('(dp.fecha_hora)'),DB::raw('(dp.cantidad)'),DB::raw('(dp.idpedido)'),DB::raw('(dp.id)'),DB::raw('(dp.producto)'))
        ->get();

        $articulos=DB::table('articulos as a')
    		->join('categorias as c','a.idcategoria','=','c.id')
    		->select('a.idcategoria','a.nombre','a.stock','c.nombre as cat')
            ->groupBy('a.idcategoria','a.nombre','a.stock','c.nombre')
            ->get();

            $mas_ingresados = DB::select('SELECT di.idarticulo, a.nombre, SUM(di.cantidad) AS TotalIngresos 
                    FROM detalle_ingresos as di 
                    JOIN articulos as a 
                    WHERE a.id = di.idarticulo 
                    GROUP BY di.idarticulo 
                    ORDER BY SUM(di.cantidad) DESC 
                    LIMIT 0 , 10');

            $mas_vendidos = DB::select('SELECT v.idarticulo, a.nombre, SUM(v.cantidad) AS TotalVentas 
                    FROM detalle_ventas as v 
                    JOIN articulos as a 
                    WHERE a.id = v.idarticulo 
                    GROUP BY v.idarticulo 
                    ORDER BY SUM(v.cantidad) DESC 
                    LIMIT 0 , 10');


     
 
        return ['mas_ingresados' => $mas_ingresados,'mas_vendidos' => $mas_vendidos,'detalle_ingresos'=>$detalle_ingresos,'detalle_ventas'=>$detalle_ventas,'detalle_pedidos'=>$detalle_pedidos,'articulos'=>$articulos,'anio'=>$anio];      
 
    }
}