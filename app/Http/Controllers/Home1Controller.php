<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
 
use Illuminate\Http\Request;
 
class Home1Controller extends Controller
{
    public function __invoke(Request $request)
    {
     
       
        $fechaActual= date('d-m-Y h:m:s');
 
        return ['fechaActual'=>$fechaActual];      
 
    }
}