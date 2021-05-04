 <!-- Proyecto Fundiacero Realiado por Ingeniero: Orlando Marvin Gutierrez Hidalgo -->
 <!-- Sistema Realizado el 2021 -->
 <!-- Universidad Privada Franz Tamayo -->

<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
               
            </ol>
            <section class="full-width header-well">
                            <div class="full-width header-well-icon">
                               <img src="/imagenes/icono.png" width="60" height="60" class="icono-fundi">
                            </div>
                            <div class="full-width header-well-text">
                                <p class="text-condensedLight">
                                   Seccion de Detalles de Pedidos Fundiciones Fundiacero S.A.
                                </p>
                            </div>
            </section>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Pedidos
                    </div>
                    <!-- Listado-->
                    <template v-if="listado==1">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-13">
                                <div class="input-group">
                                    <select class="form-control2 col-md-4" v-model="criterio">
                                      <option value="id">Nº Pedido</option>
                                      <option value="solicitante">Nombre Solicitante</option>
                                      <option value="fecha_hora">Fecha-Hora</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarPedido(1,buscar,criterio)" class="form-control2" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarPedido(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                     <div class="table-responsive">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                                <thead>
                                    <tr>
                                        <th>Nº Pedido</th>
                                        <th>Area</th>
                                        <th>Solicitante</th>
                                        <th>Fecha Hora</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="pedido in arrayPedido" :key="pedido.id">
                                      
                                        <td v-text="pedido.id"></td>
                                        <td v-text="pedido.nombre"></td>                                        
                                        <td v-text="pedido.solicitante"></td>
                                        <td v-text="pedido.fecha_hora"></td>
                                        <td>
                                        <div v-if="pedido.estado">
                                            <span class="badge badge-success">Registrado</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Anulado</span>
                                        </div>
                                        
                                    </td>
                                        <td>
                                            <button type="button" @click="verPedido(pedido.id)" class="btn btn-success btn-sm">
                                            <i class="icon-eye"></i>
                                            </button> &nbsp;
                                            <button type="button" @click="pdfPedido(pedido.id)" class="btn btn-info btn-sm">
                                            <i class="icon-doc"></i>
                                            </button>
                                             <template v-if="pedido.estado=='1'">
                                                <button type="button" class="btn btn-danger btn-sm" @click="desactivarPedido(pedido.id)">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </template>
                                        </td>
                                    </tr>                                
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    </template>
                    <!--Fin Listado-->
                    <!--Ver ingreso-->
                    <template v-else-if="listado==2">
                    <div class="card-body">
                        <div class="form-group row border">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Area</label>
                                    <p v-text="cliente"></p>
                                </div>
                                </div>
                                <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="">Solicitante</label>
                                    <p v-text="solicitante"></p>
                                </div>
                            </div> 
                                 <div class="col-md-4">
                                 <div class="form-group">
                                    <label for="">Fecha de Pedido</label>
                                    <p v-text="fecha_hora"></p>
                                </div>
                            </div>                     
                        </div>
                        <div class="form-group row border">
                            <div class="table-responsive">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Medida</th>
                                            <th>Detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayDetalle.length">
                                        <tr v-for="detalle in arrayDetalle" :key="detalle.id">
                                            <td v-text="detalle.producto">
                                            </td>
                                            <td v-text="detalle.cantidad">
                                            </td>
                                            <td v-text="detalle.medida">
                                            </td>                                            
                                            <td v-text="detalle.detallep">
                                            </td>
                                        </tr>
                                    </tbody>  
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="5">
                                                No hay articulos agregados
                                            </td>
                                        </tr>
                                    </tbody>                                  
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" @click="ocultarDetalle()" class="btn btn-primary float-center">Cerrar</button>
                            </div>
                        </div>
                    </div>
                    </template>
                    <!--Fin ver ingreso-->
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
</template>

<script>
    import vSelect from 'vue-select';
    export default {
        data (){
            return {
                pedido_id: 0,
                idcliente:0,
                cliente:'',
                tipo_comprobante : 'BOLETA',
                serie_comprobante : '',
                num_comprobante : '',
                impuesto: 0.18,
                total:0.0,
                totalImpuesto: 0.0,
                totalParcial: 0.0,
                arrayPedido : [],
                arrayCliente : [],
                arrayDetalle : [],
                listado:1,
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorPedido : 0,
                errorMostrarMsjPedido : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'id',
                buscar : '',
                criterioA: 'nombre',
                buscarA:'',
                arrayArticulo: [],
                idarticulo: 0,
                codigo: '',
                articulo: '',
                precio: 0,
                cantidad: 0,
                descuento: 0,
                stock: 0,
            }
        },
        components: {
            vSelect
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },

            //Calcula los elementos de la paginación
            pagesNumber: function() {
                if(!this.pagination.to) {
                    return [];
                }
                
                var from = this.pagination.current_page - this.offset; 
                if(from < 1) {
                    from = 1;
                }

                var to = from + (this.offset * 2); 
                if(to >= this.pagination.last_page){
                    to = this.pagination.last_page;
                }  

                var pagesArray = [];
                while(from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;             

            },

            calcularTotal: function(){
                var resultado=0.0;
                for(var i=0;i<this.arrayDetalle.length;i++){
                    resultado=resultado+(this.arrayDetalle[i].precio*this.arrayDetalle[i].cantidad-this.arrayDetalle[i].descuento)
                }
                return resultado;
            }
        },
        methods : {
            listarPedido (page,buscar,criterio){
                let me=this;
                var url= '/pedido?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayPedido = respuesta.pedidos.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            pdfPedido(id){
                window.open('/pedido/pdf/'+ id ,'_blank');
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarPedido(page,buscar,criterio);
            },
            mostrarDetalle(){
                let me=this;
                me.listado=0;

                me.idproveedor=0;
                    me.tipo_comprobante='BOLETA';
                    me.serie_comprobante='';
                    me.num_comprobante='';
                    me.impuesto=0.18;
                    me.total=0.0;
                    me.idarticulo=0;
                    me.producto='';
                    me.cantidad=0;
                    me.precio=0;
                    me.arrayDetalle=[];
            },
            ocultarDetalle(){
                this.listado=1;
            },
            verPedido(id){
                let me=this;
                me.listado=2;

                //Obtener datos del ingreso
                var arrayPedidoT=[];
                var url= '/pedido/obtenerCabecera?id=' + id;

                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    arrayPedidoT = respuesta.pedido;
                    
                    me.cliente = arrayPedidoT[0]['nombre'];
                    me.solicitante=arrayPedidoT[0]['solicitante'];
                    me.fecha_hora=arrayPedidoT[0]['fecha_hora'];
                    me.num_comprobante=arrayPedidoT[0]['num_comprobante'];
                    me.impuesto=arrayPedidoT[0]['impuesto'];
                    me.total=arrayPedidoT[0]['total'];
                })
                .catch(function (error) {
                    console.log(error);
                });

                //obtener datos de los detalles
                 var url= '/pedido/obtenerDetalles?id=' + id;

                axios.get(url).then(function (response) {
                    console.log(response);
                    var respuesta= response.data;
                    me.arrayDetalle = respuesta.detalles;

                })
                .catch(function (error) {
                    console.log(error);
                });
            },
              desactivarPedido(id){
               swal({
                title: 'Esta seguro de anular este Pedido?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Aceptar!',
                cancelButtonText: 'Cancelar',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me = this;

                    axios.put('/pedido/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarPedido(1,'','solicitante');
                        swal(
                        'Anulado!',
                        'El Pedido ha sido anulado con éxito.',
                        'success'
                        )
                    }).catch(function (error) {
                        console.log(error);
                    });
                    
                    
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    
                }
                }) 
            },

        },
        mounted() {
            this.listarPedido(1,this.buscar,this.criterio);
        }
    }
</script>
<style>    
    .modal-content{
        width: 100% !important;
        position: absolute !important;
    }
    .mostrar{
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error{
        display: flex;
        justify-content: center;
    }
    .text-error{
        color: rgb(13, 123, 240) !important;
        font-weight: bold;
    }
    @media (min-width: 600px) {
        .btnagregar {
            margin-top: 2rem;
        }
    }

</style>
