<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable =[
        'idcategoria','idunidad','idtiempo','idestado','codigo','nombre','stock','tiempo','descripcion','marca','imagen','condicion'
    ];
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }
    public function unidad(){
        return $this->belongsTo('App\Unidad');
    }
    public function tiempo(){
        return $this->belongsTo('App\Tiempo');
    }
    public function estado(){
        return $this->belongsTo('App\Estado');
    }
}
