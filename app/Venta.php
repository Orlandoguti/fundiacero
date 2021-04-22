<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Venta extends Model
{
    protected $fillable =[
        'idcliente', 
        'idusuario',
        'serie_comprobante',
        'fecha_hora',
        'estado'
    ];
}