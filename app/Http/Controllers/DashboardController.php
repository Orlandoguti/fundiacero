<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
 
use Illuminate\Http\Request;
 
class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {

        $detalle_ingresos=DB::select('SELECT  di.fecha_hora as fechai, di.idingreso, COUNT(di.idarticulo) AS totalc 
        FROM detalle_ingresos as di
        GROUP BY di.fecha_hora,di.idingreso
        ORDER BY COUNT(di.idarticulo) DESC 
        LIMIT 0 , 10');

        $detalle_ventas=DB::select('SELECT  dv.fecha_hora as fechav, dv.idventa, COUNT(dv.idarticulo) AS totalv
                FROM detalle_ventas as dv
                GROUP BY dv.fecha_hora,dv.idventa
                ORDER BY COUNT(dv.idarticulo) DESC 
                LIMIT 0 , 10');

       

        $detalle_pedidos=DB::select('SELECT  dv.fecha_hora as fechap, dv.idpedido, COUNT(dv.producto) AS totalp 
        FROM detalle_pedidos as dv
        GROUP BY dv.fecha_hora,dv.idpedido
        ORDER BY COUNT(dv.producto) DESC 
        LIMIT 0 , 10');

        $articulos=DB::table('articulos as a')
    		->join('categorias as c','a.idcategoria','=','c.id')
    		->select('a.idcategoria','a.nombre','a.stock','c.nombre as cat')
            ->groupBy('a.idcategoria','a.nombre','a.stock','c.nombre')
            ->get();

        $productos_area = DB::select('SELECT a.idcategoria, ca.nombre, SUM(a.condicion) AS totalproductos 
                FROM articulos as a 
                JOIN categorias as ca 
                WHERE ca.id = a.idcategoria 
                GROUP BY a.idcategoria
                ORDER BY SUM(a.condicion) DESC 
                LIMIT 0 , 10');

        $pedidos_area = DB::select( 'SELECT ca.nombre, SUM(pe.estado) as totalproductos 
                        FROM pedidos as pe
                        JOIN categorias as ca
                        WHERE (pe.idcategoria = ca.id)
                        GROUP BY ca.nombre
                        LIMIT 0 , 10');

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

          
           

   
 
        return ['pedidos_area' => $pedidos_area,'productos_area' => $productos_area,'mas_ingresados' => $mas_ingresados,'mas_vendidos' => $mas_vendidos,'detalle_ingresos'=>$detalle_ingresos,'detalle_ventas'=>$detalle_ventas,'detalle_pedidos'=>$detalle_pedidos,'articulos'=>$articulos];      
 
    }
}