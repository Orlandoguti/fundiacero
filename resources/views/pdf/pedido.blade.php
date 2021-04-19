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
 
        #logo{
        width: 110px;
        height:60px;
        float: left;
        margin-right: 2%;
        }
        #separado{
            width: 100%;
            height:85px;
        }
 
        #imagen{
        width: 100px;
        height:50px;
        }
 
        #datos{
        float: left;
        margin-top: 0%;
        margin-right: 2%;
        /*text-align: justify;*/
        }
 
        #encabezado{
        text-align: center;
        margin-right: 35%;
        font-size: 12px;
        }
        #titulo{
        text-align: center;
        font-size: 15px;
        margin-bottom:10px;
        }
 
        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 4%;
        font-size: 23px;
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
    </style>
    <body>
        @foreach ($pedido as $p)
        <header>
            <div id="logo">
                <img src="imagenes/Captura.png" alt="FUNDIACERO S.A." id="imagen">
            </div>
            <div id="datos">
                <p id="encabezado">
                    <b>Fundiciones Fundiacero S.A.</b><br>Warnes, Bolivia<br>Telefono - Celualar:+(591)76621804<br>Email: central@fundiacero.com
                </p>
            </div>
            <div id="fact">
                <p><br>
                Nº Pedido-.{{$p->id}}</p>
            </div>
        </header>
        <br>
        <section>
        <div id="titulo"><b>ORDEN DE PEDIDO</b></div>
        </section>
        <section>
            <div>
            <table id="facarticulo">
                    <thead>                        
                        <tr id="fa">
                            <th>Area</th>
                            <th>Nombre Solicitante</th>
                            <th>Fecha de Pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$p->nombre}}</td>
                            <td> {{$p->solicitante}}</td>
                            <td>{{$p->created_at}}</td>
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
                            <th>Poducto</th>
                            <th>Cantidad</th>
                            <th>Unidad de Medida</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $det)
                        <tr>                            
                            <td>{{$det->producto}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->medida}}</td>
                            <td>{{$det->detallep}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
        <div id="gracias">
            <div id="gracias1">
                <p><b>..............................</b><br>
                <b>SOLICITADO POR</b></p>
            </div>
            <div id="gracias2">
                <p><b>.................................</b><br>
                <b>RECEPCIONADO POR</b></p>
            </div>
        </div>
        </footer>
        <div id="separado"></div>
        @foreach ($pedido as $p)
        <header>
            <div id="logo">
                <img src="imagenes/Captura.png" alt="FUNDIACERO S.A." id="imagen">
            </div>
            <div id="datos">
                <p id="encabezado">
                    <b>Fundiciones Fundiacero S.A.</b><br>Warnes, Bolivia<br>Telefono - Celualar:+(591)76621804<br>Email: central@fundiacero.com
                </p>
            </div>
            <div id="fact">
                <p><br>
                Nº Pedido-.{{$p->id}}</p>
            </div>
        </header>
        <br>
        <section>
        <div id="titulo"><b>ORDEN DE PEDIDO</b></div>
        </section>
        <section>
            <div>
            <table id="facarticulo">
                    <thead>                        
                        <tr id="fa">
                            <th>Area</th>
                            <th>Nombre Solicitante</th>
                            <th>Fecha de Pedido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$p->nombre}}</td>
                            <td> {{$p->solicitante}}</td>
                            <td>{{$p->created_at}}</td>
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
                            <th>Poducto</th>
                            <th>Cantidad</th>
                            <th>Unidad de Medida</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $det)
                        <tr>                            
                            <td>{{$det->producto}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->medida}}</td>
                            <td>{{$det->detallep}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
        <div id="gracias">
            <div id="gracias1">
                <p><b>..............................</b><br>
                <b>SOLICITADO POR</b></p>
            </div>
            <div id="gracias2">
                <p><b>.................................</b><br>
                <b>RECEPCIONADO POR</b></p>
            </div>
        </div>
        </footer>
        
    </body>

    
</html>