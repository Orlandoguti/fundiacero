<template>
            <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Principal</a></li>
            </ol>
            <section class="full-width header-well">
                            <div class="full-width header-well-icon">
                               <img src="/imagenes/icono.png" width="60" height="60" class="icono-fundi">
                            </div>
                            <div class="full-width header-well-text">
                                <p class="text-condensedLight">
                                   Seccion de Pedidos Fundiciones Fundiacero S.A.
                                </p>
                            </div>
                        </section>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Pedidos
                                <div class="float-right" style="margin-right: 15px;" v-for="pedidos in arrayPedido" :key="pedidos.id">Nº Pedido - 
                                <span v-text="pedidos.id+1"></span> 
                                </div> 
                    </div>
                    
                    <!-- Listado-->
                    <!--Fin Listado-->
                    <!-- Detalle-->
                    <template v-if="listado==1">
                    <div class="card-body">
                        <div class="form-group row border">
                            <div class="col-md-4">
                               
                                    <label>Nombre del Area:</label>
                                     <select class="form-control col-md-9" v-model="idcategoria">
                                            <option value="0" disabled>Seleccione la Area</option>
                                            <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                    </select>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre del Solicitante:</label>
                                    <input type="text" class="form-control" v-model="solicitante" placeholder="Ingrese Nombre...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div v-show="errorPedido" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjPedido" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         <div class="form-group row border">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Producto: <span style="color: red;" v-show="producto==0"></span></label>
                                    <input type="text" value="0" class="form-control" v-model="producto" placeholder="Ingrese Producto....">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Cantidad: <span style="color: red;" v-show="cantidad==0"></span></label>
                                    <input type="number" value="0" step="any" class="form-control" v-model="cantidad" placeholder="Ingrese Cantidad....">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                 <label>Undidad de Medida: <span style="color: red;"></span></label>
                                <select class="form-control" v-model="medida" placeholder="Seleccione Unidad">
                                            <option value="0" disabled>Seleccione Unidad</option>
                                            <option value="Kg" >Kg</option>
                                            <option value="Pza" >Pza</option>
                                            <option value="Toneladas" >Toneladas</option>
                                            <option value="Litros" >Litros</option>
                                            <option value="Metros" >Metros</option>

                                </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Detalles:</label>
                                    <input type="text" value="0" class="form-control" v-model="detallep" placeholder="Ingrese Detalle...">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button @click="agregarDetalle()" class="btn btn-success form-control btnagregar"><i class="icon-plus"></i></button>
                                </div>
                            </div>
                        	<div class="table-responsive">
					            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                                    <thead>
                                        <tr>                                            
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Unidad de Medida</th>                                            
                                            <th>Detalles</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayDetalle.length">
                                        <tr v-for="(detalle,index) in arrayDetalle" :key="detalle.id">
                                           <td  v-text="detalle.producto"></td>
                                            <td v-text="detalle.cantidad"></td>
                                            <td v-text="detalle.medida"></td>
                                            <td v-text="detalle.detallep"></td>                                            
                                            <td>
                                                <button @click="eliminarDetalle(index)" type="button" class="btn btn-danger btn-sm">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </td> 
                                        </tr>
                                    </tbody>  
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="6">
                                                No hay Productos agregados
                                            </td>
                                        </tr>
                                    </tbody>                                  
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-13">
                                
                                <button type="button" class="btn btn-primary float-rigth" @click="registrarPedido()">Generar Pedido</button>
                            </div>
                        </div>
                    </div>
                    </template>
                    <!-- Fin Detalle-->
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
</template>

<script>
    export default {
        data (){
            return {
                pedido_id: 0,
                idpedido:'',
                idcategoria:0,
                producto: '',
                medida:'0',
                nombre_categoria : '',
                cliente:'',
                categoria:'',
                solicitante : '',
                arrayPedido : [],
                arrayDetalle : [],
                listado:1,
                tipoAccion : 0,
                errorPedido : 0,
                errorMostrarMsjPedido : [],
                arrayCategoria :[],
                cantidad: 0,
                detallep: '',
            }
        },
        methods : {

            listarPedido (){
                let me=this;
                var url= '/pedido/num?page=';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayPedido = respuesta.pedidos.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectCategoria(){
                let me=this;
                var url= '/categoria/selectCategoria';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayCategoria = respuesta.categorias;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            pdfPedido(id){
                window.open('/pedido/pdf/'+ id ,'_blank');
            },
           eliminarDetalle(index){
                let me = this;
                me.arrayDetalle.splice(index, 1);
            },
            agregarDetalle(){
                 
                let me=this;
                if(me.producto==0){
                     swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Ingrese Nombre del Producto!',
                        })
                    }else{
                         if(me.cantidad==0){
                     swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Ingrese Cantidad del Producto!',
                        })
                    }else{
                         if(me.medida==0){
                     swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Seleccione Medida del Producto!',
                        })
                    }else{
                    me.arrayDetalle.push({
                            cantidad: me.cantidad,
                            detallep:'No Hay detalle',
                            medida: me.medida,
                            producto: me.producto,
                            });
                            me.producto='';
                            me.cantidad=0;
                            me.detallep='';
                        
                 }if(me.detallep){
                            me.arrayDetalle.push({
                            cantidad: me.cantidad,
                            detallep: me.detallep,
                            medida: me.medida,
                            producto: me.producto,
                            });
                            me.producto='';
                            me.cantidad=0;
                            me.detallep='';
                }
                }
                }
                 
                        
            },

            registrarPedido(){
                if (this.validarPedido()){
                    return;
                }
                
                swal({
                title: 'Esta seguro de realizar este Pedido?',
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

                axios.post('/pedido/registrar',{
                    'idcategoria': this.idcategoria,
                    'solicitante': this.solicitante,
                    'data' : this.arrayDetalle

                }).then(function (response) {
                    me.listado=1;
                    me.listarPedido(1,'','solicitante');
                    me.idproveedor=0;
                    me.solicitante='';
                    me.idcategoria=0;
                    me.cantidad=0;
                    me.producto='';
                    me.medida='0';
                    me.codigo='';
                    me.detallep='';
                    me.arrayDetalle=[];
                    window.open('/pedido/pdf/'+ response.data.id);
                swal(
                        'Registrado!',
                        'El Pedido ha sido registrado con éxito.',
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
            validarPedido(){
                let me=this;
                me.errorPedido=0;
                me.errorMostrarMsjPedido =[];
                var art;

                if (me.idcategoria==0){swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Seleccione Una Area!',
                        });
                }else{
                    if (me.solicitante==0){ swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Ingrese Nombre Del Solicitante!',
                        });
                    }else{
                        if (me.arrayDetalle.length<=0) swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Ingrese Productos a Pedir!',
                        });
                    }
                }
                if (me.solicitante==0) me.errorMostrarMsjPedido.push("");
                if (me.idcategoria==0) me.errorMostrarMsjPedido.push("");
                if (me.arrayDetalle.length<=0) me.errorMostrarMsjPedido.push("");

                if (me.errorMostrarMsjPedido.length) me.errorPedido = 1;

                return me.errorPedido;
            },
            mostrarDetalle(){
                let me=this;
                me.listado=0;
                    me.categoria='';
                    me.solicitante='';
                    me.medida='0';
                    me.producto='';
                    me.cantidad=0;
                    me.arrayDetalle=[];
            },
           },
        mounted() {
            this.selectCategoria();
            this.listarPedido();
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
