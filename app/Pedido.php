<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Pedido extends Model
{
    protected $fillable =[
        'idcategoria', 
        'idusuario',
        'solicitante',
        'serie_comprobante',
        'fecha_hora',
        'estado'
    ];
}