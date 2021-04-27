<!DOCTYPE>

<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Pedidos</title>
    <style>
        body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif; 
        font-size: 10px;
        /*font-family: SourceSansPro;*/
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
        font-size: 10px;
        }

        table {
         width: 100%;
         border: 1px solid #000;
        }
        th, td {
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
    <body>
        @foreach ($ingreso as $i)
        <header> 
        <div id="container">
        <div id="left">
        <p id="encabezado">
        <b>Fundiciones Fundiacero S.A.</b><br>Warnes, Bolivia<br>Telefono - Celular:+(591)76621804<br>Email: central@fundiacero.com
         </p>
        </div>
        <div id="center"><b id="orden">DETALLE DE INGRESO</b></div>
        <div id="right">
        <div><img src="imagenes/Captura.png" alt="FUNDIACERO S.A." id="imagen"></div>
        <div><p id="nuemrop">Nº Ingreso-.{{$i->id}}</p></div>
        </div>           
        </header>
        <section>
            <div>
            <table id="facarticulo">
                    <thead>                        
                        <tr id="fa">
                            <th>Encargado</th>
                            <th>Area</th>
                            <th>Tipo de Comprobante</th>
                            <th>Serie de Comprobante</th>
                            <th>Detalles</th>
                            <th>Fecha de Ingreso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        
                            <td>{{$i->usuario}}</td>
                            <td>{{$i->nombre}}</td>
                            <td> {{$i->tipo_comprobante}}</td>
                            <td> {{$i->serie_comprobante}}</td>
                            <td>{{$i->detalle}}</td>
                            <td>{{$i->fecha_hora}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        @endforeach
        <section>
            <div>
                <table id="facarticulo">
                    <thead>
                        <tr id="fa">
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $det)
                        <tr>
                            <td>{{$det->articulo}}</td>                            
                            <td>{{$det->cantidad}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer id="sello">
        <div id="gracias">
            <div id="gracias1">
                <p><b>..............................</b><br>
                <b>FIRMA Y SELLO</b></p>
            </div>
            <div id="gracias2">
                <p><b>.................................</b><br>
                <b>FIRMA Y SELLO</b></p>
            </div>
        </div>
        </footer>
        <div id="separado"></div>

    </body>
</html>
