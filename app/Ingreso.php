<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Ingreso extends Model
{
    protected $fillable = [
        'idcategoria', 
        'idusuario',
        'detalle',
        'tipo_comprobante',
        'serie_comprobante',
        'created_at',
        'estado'
     ];
     public function usuario()
     {
         return $this->belongsTo('App\User');
     }
     public function proveedor()
     {
         return $this->belongsTo('App\Categoria');
     }
  
  
}