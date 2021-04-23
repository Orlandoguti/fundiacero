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
        DB::raw('(i.created_at) as dia'),
        DB::raw('SUM(i.estado) as total'))
        ->whereYear('i.fecha_hora',$anio)
        ->groupBy(DB::raw('MONTH(i.fecha_hora)'),DB::raw('YEAR(i.fecha_hora)'),DB::raw('(i.created_at)'),DB::raw('(i.id)'))
        ->get();

       
        $ingresos=DB::table('ingresos as i')
        ->select(DB::raw('MONTH(i.fecha_hora) as mes'),
        DB::raw('YEAR(i.fecha_hora) as anio'),
        DB::raw('(i.id) as id'),
        DB::raw('(i.created_at) as dia'),
        DB::raw('SUM(i.estado) as total'))
        ->whereYear('i.fecha_hora',$anio)
        ->groupBy(DB::raw('MONTH(i.fecha_hora)'),DB::raw('YEAR(i.fecha_hora)'),DB::raw('(i.created_at)'),DB::raw('(i.id)'))
        ->get();
 
        $ventas=DB::table('ventas as v')
        ->select(DB::raw('MONTH(v.fecha_hora) as mes'),
        DB::raw('YEAR(v.fecha_hora) as anio'),
        DB::raw('SUM(v.estado) as total'))
        ->whereYear('v.fecha_hora',$anio)
        ->groupBy(DB::raw('MONTH(v.fecha_hora)'),DB::raw('YEAR(v.fecha_hora)'))
        ->get();
 
        return ['ingresos'=>$ingresos,'ventas'=>$ventas,'anio'=>$anio];      
 
    }
}