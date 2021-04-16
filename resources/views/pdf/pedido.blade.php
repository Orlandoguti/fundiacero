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
        font-size: 14px;
        /*font-family: SourceSansPro;*/
        }
 
        #logo{
        float: left;
        margin-top: 1%;
        margin-left: 2%;
        margin-right: 2%;
        }
 
        #imagen{
        width: 150px;
        height:150px;
        }
 
        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
        }
 
        #encabezado{
        text-align: center;
        margin-left: 10%;
        margin-right: 50%;
        font-size: 15px;
        }
 
        #fact{
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        }
 
        section{
        clear: left;
        }
 
        #cliente{
        text-align: left;
        }
 
        #facliente{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }
 
        #facliente thead{
        padding: 20px;
        background: #2183E3;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facvendedor thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facarticulo{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facarticulo thead{
        padding: 20px;
        background: #2183E3;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #gracias{
        width: 380px;
        display: flex;
        text-align: center; 
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
                <img src="imagenes/Captura.jpg" alt="FUNDIACERO S.A." id="imagen">
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
                <p><b>................</b><br>
                <b>RECEPCIONADO POR</b></p>
            </div>
            <div id="gracias2">
                <p><b>................</b><br>
                <b>RECIBIDO POR</b></p>
            </div>
        </div>
        </footer>
    </body>
</html>