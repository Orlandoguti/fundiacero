<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
  //protected $table = 'categorias';
    //protected $primaryKey = 'id';
    protected $fillable = ['nombre','condicion'];

    public function articulos()
    {
        return $this->hasMany('App\Articulo');
    }
}
