<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable =[
        'idcategoria','idunidad','codigo','nombre','precio_venta','stock','descripcion','imagen','condicion'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
    public function unidad(){
        return $this->belongsTo('App\Unidad');
    }
}
