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
                                   Seccion de Registro de Despacho Fundiciones Fundiacero S.A.
                                </p>
                            </div>
                        </section>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Despachos
                         <div class="float-right" style="margin-right: 15px;" v-for="venta in arrayVenta" :key="venta.id">Nº Despacho - 
                                <span v-text="venta.id+1"></span> 
                         </div> 
                    </div>
                    <!-- Detalle-->
                    <template v-if="listado==1">
                    <div class="card-body">
                        <div class="form-group row border">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Area:</label>
                                        <select class="form-control" v-model="idcategoria">
                                            <option value="0" disabled>Seleccione la Area</option>
                                            <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                        </select>                                        
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre Solicitante:</label>
                                    <input type="text" class="form-control" v-model="serie_comprobante" placeholder="Ingrese Nombre del Solicitante...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div v-show="errorVenta" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjVenta" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row border">
                            <div class="col-md-5">
                               
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button @click="abrirModal()" class="btn btn-success form-control btnagregar"><i class="icon-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row border">
                         <div class="table-responsive">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Stock Producto</th>
                                            <th>Nuevo Stock</th>
                                            <th>Unidad de Medida</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayDetalle.length">
                                        <tr v-for="(detalle,index) in arrayDetalle" :key="detalle.id">
                                            <td>
                                                <button @click="eliminarDetalle(index)" type="button" class="btn btn-danger btn-sm">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </td>
                                            <td v-text="detalle.articulo">
                                            </td>
                                             <td>
                                                 <span style="color:red;" v-show="detalle.cantidad>detalle.stock">Stock Insuficiente: {{detalle.stock}}</span>
                                                <input v-model="detalle.cantidad" type="number" value="2" class="form-control">
                                            </td>
                                             <td v-text="detalle.stock">
                                            </td>
                                             <td v-text="detalle.stock-detalle.cantidad">
                                            </td>
                                            <td v-text="detalle.nombre_unidad">
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
                            <div class="col-md-7">
                                <button type="button" class="btn btn-primary float-right" @click="registrarVenta()">Registrar Despacho</button>
                            </div>
                        </div>
                    </div>
                    </template>
                    <!-- Fin Detalle-->
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i class="zmdi zmdi-washing-machine"></i>
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="form-group row">
                                <div class="col-md-12">
                                <div class="input-group">
                                       <select v-model="buscar" @click="listarArticulo(1,buscar,criterio)" class="form-control2 col-md-5">
                                            <option value="" disabled>Seleccione la Area</option>
                                            <option value="">Todos</option>
                                            <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                        </select>
                                    <select class="form-control2 col-md-4" v-model="criterioA">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                      <option value="codigo">Codigo</option>
                                    </select>
                                    <input type="text" v-model="buscarA" @keyup.enter="listarArticulo(1,buscarA,criterioA)" class="form-control2" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarArticulo(1,buscarA,criterioA)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                           <div class="table-responsive">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                                 <thead>
                                 <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Area</th>
                                    <th>Stock</th>
                                    <th>Medida</th>                                 
                                    <th>Estado</th>
                                    </tr>
                                   </thead>
                                   <tbody>
                                     <tr v-for="articulo in arrayArticulo" :key="articulo.id">
                                    <td>
                                        <button type="button" @click="agregarDetalleModal(articulo)" class="btn btn-success btn-sm">
                                          <i class="icon-check"></i>
                                        </button>
                                    </td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-text="articulo.nombre_categoria"></td>
                                    <td v-text="articulo.stock"></td>
                                    <td v-text="articulo.nombre_unidad"></td>
                                    <td>
                                        <div v-if="articulo.condicion">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>
                                        
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarPersona()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarPersona()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
        </main>
</template>

<script>
    import vSelect from 'vue-select';
    export default {
        data (){
            return {
                venta_id: 0,
                idcategoria : 0,
                nombre_categoria : '',
                categoria:'',
                serie_comprobante : '',
                totalParcial: 0.0,
                arrayVenta : [],
                arrayDetalle : [],
                listado:1,
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorVenta : 0,
                errorMostrarMsjVenta : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                offset : 3,
                criterio : 'idcategoria',
                buscar : '',
                criterioA: 'nombre',
                buscarA:'',
                criterioV : 'id',
                buscarV : '',
                arrayArticulo: [],
                arrayCategoria :[],
                idarticulo: 0,
                codigo: '',
                articulo: '',
                cantidad: 0,
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

            }
        },
        methods : {
            listarVenta (page){
                let me=this;
                var url= '/venta/num?page=' + page;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayVenta = respuesta.ventas.data;
                    me.pagination= respuesta.pagination;
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


            buscarArticulo(){
                let me=this;
                var url= '/articulo/buscarArticuloVenta?filtro=' + me.codigo;

                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayArticulo = respuesta.articulos;

                    if(me.arrayArticulo.length>0){
                        me.articulo=me.arrayArticulo[0]['nombre'];
                        me.idarticulo=me.arrayArticulo[0]['id'];
                        me.stock=me.arrayArticulo[0]['stock'];
                    }
                    else{
                        me.articulo='No existe este articulo';
                        me.idarticulo=0;
                    }
                })
                .catch(function (error){
                    console.log(error);
                });
            },
            pdfVenta(id){
                window.open('/venta/pdf/'+ id ,'_blank');
            },
            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarVenta(page,buscar,criterio);
                 me.listarArticulo(page,buscar,criterio);
            },
            encuentra(id){
                var sw=0;
                for(var i=0;i<this.arrayDetalle.length;i++){
                    if(this.arrayDetalle[i].idarticulo==id){
                        sw=true;
                    }
                }
                return sw;
            },
            eliminarDetalle(index){
                let me = this;
                me.arrayDetalle.splice(index, 1);
            },
            agregarDetalle(){
                let me=this;
                if(me.idarticulo==0 || me.cantidad==0 ){
                }else{
                    if(me.encuentra(me.idarticulo)){
                        swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Este Artículo ya se encuentra agregado!',
                        })
                    }else{
                        if(me.cantidad>me.stock){
                            swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'No hay stock disponible!',
                        })
                        }else{
                            me.arrayDetalle.push({
                            idarticulo: me.idarticulo,
                            articulo: me.articulo,
                            cantidad: me.cantidad,
                            stock: me.stock,
                            nombre_unidad: me.nombre_unidad
                            });
                            me.codigo='';
                            me.idarticulo=0;
                            me.articulo='';
                            me.cantidad=0;
                            me.stock=0,
                            nombre_unidad=''
                        }
                    }
                   
                }
                
            },
            agregarDetalleModal(data =[]){
                let me=this;
                if(me.encuentra(data['id'])){
                        swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Este Artículo ya se encuentra agregado!',
                        })
                    }else{
                    me.arrayDetalle.push({
                    idarticulo: data['id'],
                    articulo: data['nombre'],
                    cantidad: 1,
                    stock:data['stock'],
                    nombre_unidad:data['nombre_unidad']
                    });
                    }
            },
            listarArticulo (page,buscar,criterio,buscarA,criterioA){
                let me=this;
                var url= '/articulo?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio + '&buscarA='+ buscarA + '&criterioA='+ criterioA ;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayArticulo = respuesta.articulos.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
       
            registrarVenta(){
                if (this.validarVenta()){
                    return;
                }
                swal({
                title: 'Esta seguro de realizar este Despacho?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Aceptar!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                let me = this;

                axios.post('/venta/registrar',{
                    'idcategoria': this.idcategoria,
                    'idcategoria': this.idcategoria,
                    'serie_comprobante' : this.serie_comprobante,
                    'data' : this.arrayDetalle

                }).then(function (response) {
                    me.listado=1;
                    me.listarVenta(1,'','id');
                    me.idcategoria=0;
                    me.serie_comprobante='';
                    me.idarticulo=0;
                    me.idcategoria=0;
                    me.articulo='';
                    me.cantidad=0;
                    me.stock=0;
                    me.codigo='';
                    me.arrayDetalle=[];
                 swal(
                        'Registrado!',
                        'El Despacho ha sido registrado con éxito.',
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
            validarVenta(){
                let me=this;
                me.errorVenta=0;
                me.errorMostrarMsjVenta =[];
                var art;

                me.arrayDetalle.map(function(x){
                    if(x.cantidad>x.stock){
                        swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Stock Insuficiente!',
                        });
                        me.errorMostrarMsjVenta.push(art);
                    }
                });

                if (me.idcategoria==0){
                     swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Seleccione Una Area!',
                        });
                }else{
                    if (!me.serie_comprobante){ 
                    swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Seleccione Un Nombre Solicitante!',
                        });
                        }else{
                             if (me.arrayDetalle.length<=0) 
                    swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Ingrese los Productos a Despachar!',
                        });
                        }
                   
                } 
                 if (me.idcategoria==0) me.errorMostrarMsjVenta.push("");
                if (me.serie_comprobante==0) me.errorMostrarMsjVenta.push("");
                if (me.arrayDetalle.length<=0) me.errorMostrarMsjVenta.push("");

                if (me.errorMostrarMsjVenta.length) me.errorVenta = 1;

                return me.errorVenta;
            },
            mostrarDetalle(){
                let me=this;
                me.listado=0;

                me.idcategoria=0;
                    me.serie_comprobante='';
                    me.idarticulo=0;
                    me.articulo='';
                    me.cantidad=0;
                    me.arrayDetalle=[];
            },
            ocultarDetalle(){
                this.listado=1;
            },
            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
            },
            abrirModal(){
                this.arrayArticulo=[];
                this.modal = 1;
                this.tituloModal = 'Seleccione los Productos';
 
            },
        
            desactivarVenta(id){
               swal({
                title: 'Esta seguro de anular esta venta?',
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

                    axios.put('/venta/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarVenta(1,'','id');
                        swal(
                        'Anulado!',
                        'La venta ha sido anulado con éxito.',
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
            this.selectCategoria();
            this.listarVenta(1,this.buscar,this.criterio);
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
