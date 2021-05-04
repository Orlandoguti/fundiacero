<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Productos</title>
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 0.875rem;
            font-weight: normal;
            line-height: 1.5;
            color: #151b1e;           
        }
        #container {
            width:100%;
            text-align:center;
        }

        #left {
            text-align:center;
            float:left;
            width:30%;
        }

        #center {
            padding-top:30px;
            display: inline-block;
            margin:0 auto;
            width:30%;
        }

        #right {
            float:right;
            width:30%;
        }
        #imagen{
            text-align:center;
            width:60%;
            height:50px;
        }
        #nuemrop{
            margin-left:15px;
            text-align:center;
            width:100%;
            font-size:15px;
        }
        #orden{
        margin-top: 15px;
        text-align:center;
        font-size: 15px;
        }

        #encabezado{
        text-align: center;
        font-size: 12px;
        }

        #separado{
            width: 100%;
            height:85px;
        }
        section{
        clear: left;
        }

        #fac, #fv, #fa{
        text-align: center;
        color: 000000;
        font-size: 12px;
        }

        table {
         width: 100%;
         border: 1px solid #000;
        }
        th, td {
            font-size:10px;
        width: 25%;
        text-align: center;
        vertical-align: top;
        border: 1px solid #000;
        border-collapse: collapse;
        padding: 0.3em;
        caption-side: bottom;
        }
        caption {
        padding: 0.3em;
        color: #fff;
            background: #000;
        }
        th {
        background: #eee;
        }
 
        #gracias{
        margin-top:35px;
        width: 380px;
        display: flex;
        text-align: center; 
        margin-left:35px;
        }
        #gracias1{
        float: left;
        text-align: center; 
        }
        #gracias2{
        float: right;
        text-align: center; 
        }
        #sello{
            margin-top:20px;
        }
    </style>
</head>
<body>
<header> 
<div id="container">
        <div id="left">
        <p id="encabezado">
        <b>Fundiciones Fundiacero S.A.</b><br>Warnes, Bolivia<br>Telefono - Celular:+(591)76621804<br>Email: central@fundiacero.com
         </p>
        </div>
        <div id="center"><b id="orden">REPORTE DE PRODUCTOS</b></div>
        <div id="right">
        <div><img src="imagenes/Captura.png" alt="FUNDIACERO S.A." id="imagen"></div>
        <div><p id="nuemrop">Fecha de Reporte <br> {{now()}}</p></div>
        </div>           
    <div>
    </header>
    <div id="separado"></div>
    <section >
            <div>
        <table id="facarticulo">
            <thead>
                <tr id="fa">
                    <th>Area</th>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Stock</th>
                    <th>Marca</th>
                    <th>Detalle</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articulos as $a)
                <tr>
                    <td>{{$a->nombre_categoria}}</td>
                    <td>{{$a->nombre}}</td>
                    <td>{{$a->codigo}}</td>
                    <td>{{$a->stock}}</td>
                    <td>{{$a->marca}}</td>
                    <td>{{$a->descripcion}}</td>
                    <td>{{$a->created_at}}</td>
                </tr>
                @endforeach                               
            </tbody>
        </table>
        </div>
        </section>
    </div>
    <table class="izquierda">
    @foreach ($count as $c)
    <tr><th>Total Productos Registrados</th>
		<td>{{$c->totalproductos}}</td></tr>
        @endforeach  
    </table>    
</body>
</html>