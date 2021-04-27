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
                                   Seccion de Registro de Ingresos Fundiciones Fundiacero S.A.
                                </p>
                            </div>
                        </section>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Ingresos
                        <div class="float-right" style="margin-right: 15px;" v-for="ingresos in arrayIngreso" :key="ingresos.id">Nº Ingreso - 
                                <span v-text="ingresos.id+1"></span> 
                         </div> 
                    </div>
                    <!-- Listado-->
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
                                    <label>Detalles:</label>
                                    <input type="text" class="form-control" v-model="detalle" placeholder="Ingrese Detalles...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo Comprobante:</label>
                                    <select class="form-control" v-model="tipo_comprobante">
                                        <option value="0" disabled>Seleccione Comprobante</option>
                                        <option value="Factura">Factura</option>
                                        <option value="Recibo">Recibo</option>
                                        <option value="Proforma">Proforma</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Serie Comprobante:</label>
                                    <input type="text" class="form-control" v-model="serie_comprobante" placeholder="Ingrese Numero Comprobante...">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div v-show="errorIngreso" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjIngreso" :key="error" v-text="error">

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
                            <div class="table-responsive col-md-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Producto</th>
                                             <th>Stock Producto</th>
                                            <th>Cantidad</th>
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
                                            <td v-text="detalle.stock">
                                            </td>
                                            <td>
                                                <input v-model="detalle.cantidad" type="number" value="2" class="form-control">
                                            </td>
                                            <td v-text="detalle.nombre_unidad">
                                            </td>
                                        </tr>
                                    </tbody>  
                                    <tbody v-else>
                                        <tr>
                                            <td colspan="5">
                                                No hay Productos agregados
                                            </td>
                                        </tr>
                                    </tbody>                                  
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-7">
                                <button type="button" class="btn btn-primary float-right" @click="registrarIngreso()">Registrar Ingreso</button>
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
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group row">
                                <div class="col-md-13">
                                <div class="input-group">
                                       <select v-model="buscar" @click="listarArticulo(1,buscar,criterio)" class="form-control col-md-5">
                                            <option value="" disabled>Seleccione la Area</option>
                                            <option value="">Todos</option>
                                             <option value="1">laminacion</option>
                                            <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                        </select>
                                    <select class="form-control col-md-4" v-model="criterioA">
                                      <option value="nombre">Nombre</option>
                                      <option value="descripcion">Descripción</option>
                                      <option value="codigo">Codigo</option>
                                    </select>
                                    <input type="text" v-model="buscarA" @keyup.enter="listarArticulo(1,buscarA,criterioA)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarArticulo(1,buscarA,criterioA)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-sm">
                                 <thead>
                                 <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Area</th>
                                    <th>Stock</th>
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
                ingreso_id: 0,
                idcategoria:0,
                categoria:'',
                nombre : '',
                serie_comprobante : '',
                detalle : '',
                arrayIngreso : [],
                arrayCategoria : [],
                arrayDetalle : [],
                listado:1,
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorIngreso : 0,
                errorMostrarMsjIngreso : [],
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
                arrayArticulo: [],
                idarticulo: 0,
                codigo: '',
                tipo_comprobante:'0',
                articulo: '',
                precio: 0,
                cantidad: 0,
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
            listarIngreso (page){
                let me=this;
                var url= '/ingreso/num?page=' + page;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayIngreso = respuesta.ingresos.data;
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
                        me.precio=me.arrayArticulo[0]['precio_venta'];
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

            cambiarPagina(page,buscar,criterio){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarIngreso(page,buscar,criterio);
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
                if(me.idarticulo==0 || me.cantidad==0 || me.precio==0){
                }else{
                    if(me.encuentra(me.idarticulo)){
                        swal({
                            type: 'error',
                            title: 'Error...',
                            text: 'Este Artículo ya se encuentra agregado!',
                        })
                    }else{
                         me.arrayDetalle.push({
                    idarticulo: me.idarticulo,
                    articulo: me.articulo,
                    cantidad: me.cantidad,
                    stock: me.stock
                    });
                    me.codigo='';
                    me.idarticulo=0;
                    me.articulo='';
                    me.cantidad=0;
                    stock.stock=0;
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
                    stock: data['stock'],
                    nombre_unidad: data['nombre_unidad']
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
            registrarIngreso(){
                
                if (this.validarIngreso()){
                    return;
                }
                

                swal({
                title: 'Esta seguro de realizar este ingreso?',
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
                }).then((result) => 
                {if (result.value) {
                   
                let me = this;
                if(me.detalle!=0 || me.serie_comprobante!=0){
                axios.post('/ingreso/registrar',{
                   
                    'idcategoria': this.idcategoria,
                    'detalle':this.detalle,
                    'tipo_comprobante' : this.tipo_comprobante,
                    'serie_comprobante' : this.serie_comprobante,
                    'data' : this.arrayDetalle

                }).then(function (response) {
                    me.listado=1;
                    me.listarIngreso(1,'','serie_comprobante');
                    me.idcategoria=0;
                    me.detalle='';
                    me.serie_comprobante='';
                    me.tipo_comprobante='0';
                    me.idarticulo=0;
                    me.articulo='';
                    me.cantidad=0;
                    me.arrayDetalle=[];
               
                    swal(
                        'Registrado!',
                        'El ingreso ha sido registrado con éxito.',
                        'success'
                        )
                
                }).catch(function (error) {
                    console.log(error);
                });
                   
             }else{
                 if(me.detalle==0 || me.serie_comprobante==0){
                     axios.post('/ingreso/registrar',{
                   
                    'idcategoria': this.idcategoria,
                    'detalle':this.detalle='Sin detalles',
                    'tipo_comprobante' : this.tipo_comprobante,
                    'serie_comprobante' : this.serie_comprobante ='Sin Comprobante',
                    'data' : this.arrayDetalle

                }).then(function (response) {
                    me.listado=1;
                    me.listarIngreso(1,'','serie_comprobante');
                    me.idcategoria=0;
                    me.detalle='';
                    me.serie_comprobante='';
                    me.tipo_comprobante='0';
                    me.idarticulo=0;
                    me.articulo='';
                    me.cantidad=0;
                    me.arrayDetalle=[];
               
                    swal(
                        'Registrado!',
                        'El ingreso ha sido registrado con éxito.',
                        'success'
                        )
                
                }).catch(function (error) {
                    console.log(error);
                });
                   
                   }
                    }
                   } 
                   else if (result.dismiss === swal.DismissReason.cancel){}   
            })
            },
            validarIngreso(){
                this.errorIngreso=0;
                this.errorMostrarMsjIngreso =[];

                if (this.idcategoria==0){
                    swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Seleccione Una Area!',
                        });
                }else{
                    if (this.tipo_comprobante==0){
                       swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Seleccione Un Tipo de Comprobante!',
                        });
                    }else{
                        if (this.arrayDetalle.length<=0) 
                        swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Ingrese Productos!',
                        });
                    }
                }
                if (this.tipo_comprobante==0) this.errorMostrarMsjIngreso.push("");
                if (this.idcategoria==0) this.errorMostrarMsjIngreso.push("");
                if (this.arrayDetalle.length<=0) this.errorMostrarMsjIngreso.push("");
                if (this.errorMostrarMsjIngreso.length) this.errorIngreso = 1;

                return this.errorIngreso;
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
        
            desactivarIngreso(id){
               swal({
                title: 'Esta seguro de desactivar este ingreso?',
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

                    axios.put('/ingreso/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarIngreso(1,'','serie_comprobante');
                        swal(
                        'Anulado!',
                        'El ingreso ha sido anulado con éxito.',
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
            this.listarIngreso();
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
