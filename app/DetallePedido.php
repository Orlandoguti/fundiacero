<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos';
    protected $fillable = [
        'idpedido', 
        'cantidad',
        'medida',
        'detallep',
        'producto'
    ];
    public $timestamps = false;
}