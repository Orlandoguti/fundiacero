<template>
          <section class="responsive">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Principal</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <template v-if="listado==1">
                     	<section class="full-width header-well">
                            <div class="full-width header-well-icon">
                               <img src="/imagenes/icono.png" width="60" height="60" class="icono-fundi">
                            </div>
                            <div class="full-width header-well-text">
                                <p class="text-condensedLight">
                                   Almacen Principal de Fundiciones Fundiacero S.A.
                                </p>
                            </div>
                        </section>
                     <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> Productos
                        
                       </div>
                     </div>
                     
                    <div class="container-fluid">

			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
               
                 <div class="form-group row">
                            <div class="col-md-13">
                                <div class="input-group">
                                        <select v-model="buscar" @click="listarArticulo(1,buscar,criterio)" class="form-control col-md-4">
                                            <option value="" disabled>Seleccione la Area</option>
                                            <option value="">Todos</option>
                                            <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                        </select>
                                    <select class="form-control col-md-3" v-model="criterioA">
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
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>
							<tr >
								<th class="mdl-data-table__cell--non-numeric">Imagen</th>
                                    <th>Area</th>								    
                                    <th>Nombre Producto</th>
                                    <th>Cantidad</th>
                                    <th>Medida</th>
                                    <th>Descripción</th>                                    
                                    <th>Garantia</th>
                                    <th>Tiempo</th>
                                    <th>Marca</th>
                                    <th>Estado Producto</th>
                                    <th>Condicion</th>                                    
                                    <th>Opciones</th>
							</tr>
						</thead>
						  <tbody>
                                <tr v-for="articulo in arrayArticulo"  :key="articulo.id">
                                    <td  <img class = "img-square" :src="'/imagenes/articulos/' + articulo.imagen" width="70" height="70" @click="verArticulo(articulo.id)"></td>
                                    <td v-text="articulo.nombre_categoria"></td>
                                    <td v-text="articulo.nombre"></td>
                                    <td v-text="articulo.stock"></td>
                                    <td v-text="articulo.nombre_unidad"></td>
                                    <td v-text="articulo.descripcion"></td>
                                    <td v-text="articulo.tiempo"></td>                                    
                                    <td v-text="articulo.nombre_tiempo"></td>                                    
                                    <td v-text="articulo.marca"></td>
                                    <td v-text="articulo.nombre_estado"></td>
                                    <td>
                                        <div v-if="articulo.condicion">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Desactivado</span>
                                        </div>   
                                    </td>                                                                        
                                    
                                    <td>
                                        <button type="button" @click="verArticulo(articulo.id)" class="btn btn-success btn-sm">
                                            <i class="icon-eye"></i>
                                            </button>
                                       </td>
                                </tr>                                
                            </tbody>
					</table>

                    
				</div>
			</div>
                 <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar,criterio,buscarA,criterioA)">Ant</a>
                                </li>
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page,buscar,criterio,buscarA,criterioA)" v-text="page"></a>
                                </li>
                                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1,buscar,criterio,buscarA,criterioA)">Sig</a>
                                </li>
                            </ul>
                        </nav>
		        </div>
                </template>
                
                <!-- Fin ejemplo de tabla Listado -->

                 <!-- Ejemplo de tabla Listado 2 detalles-->
                 <template v-else-if="listado==2">
                 <div class="card-header">
                        <i class="fa fa-align-justify"></i> Productos
                    </div>
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                    <div class="form-group row border">
                            <div class="table-responsive col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre del Producto</th>
                                            <th>Area</th>
                                            <th>Estado del Producto</th>
                                            <th>Descripcion</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayArticulo.length">
                                         <tr v-for="articulo in arrayArticulo"  :key="articulo.id">
                                            <td v-text="articulo.nombre"></td>
                                            <td v-text="articulo.nombre_categoria"></td>
                                            <td v-text="articulo.nombre_estado"></td>                                   
                                            <td v-text="articulo.descripcion"></td>                                            
                                        </tr>
                                    </tbody>                                
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row border">
                            <div class="table-responsive col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Cantidad</th>
                                            <th>Medida</th>
                                            <th>Garantia</th>
                                            <th>Tiempo</th>
                                             <th>Marca</th>
                                            <th>Fecha de Registro</th>
                                        </tr>
                                    </thead>
                                    <tbody v-if="arrayArticulo.length">
                                         <tr v-for="articulo in arrayArticulo"  :key="articulo.id">
                                            <td v-text="articulo.stock"></td>
                                            <td v-text="articulo.nombre_unidad"></td>
                                            <td v-text="articulo.tiempo"></td>                                   
                                            <td v-text="articulo.nombre_tiempo"></td>
                                            <td v-text="articulo.marca"></td>
                                            <td v-text="articulo.created_at"></td>                                             
                                        </tr>
                                    </tbody>                                
                                </table>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="form-group row border">
                                <div class="col-md-2">
                                    <div class="form-group">
                                     </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div v-for="articulo in arrayArticulo" :key="articulo.id">
                                             <img class = "img-square" :src="'/imagenes/articulos/' + articulo.imagen" width="200" height="200">
                                        </div>
                                     </div>
                                </div>
                               <div class="col-md-5">
                                    <label v-if="codigo" placeholder="Código de barras">
                                    <barcode :value="codigo" :options="{ format: 'EAN-13' }">
                                            Generando código de barras.    
                                    </barcode>                                       
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="button" @click="ocultarDetalle()"  class="btn botonlogin">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            
            <!--Inicio del modal agregar/actualizar-->
            <div class="modal fade" tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i class="zmdi zmdi-washing-machine"></i>
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Area</label>
                                    <div class="col-md-9">
                                        <select class="form-control" v-model="idcategoria">
                                            <option value="0" disabled>Seleccione la Area</option>
                                            <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                        </select>                                        
                                    </div>
                                </div>
                      
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-5">
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre de Producto" >                                        
                                    </div>
                                    <div class="col-md-4">
                                    <select class="form-control" v-model="idestado">
                                            <option value="0" disabled>Estado del Producto</option>
                                            <option v-for="estado in arrayEstado" :key="estado.id" :value="estado.id" v-text="estado.nombre"></option>
                                    </select>
                                    </div>
                                </div>
                                          <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Código</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="codigo" class="form-control" placeholder="Ingrese Codigo de Producto - AL-T0001"> 
                                        <barcode :value="codigo" :options="{ format: 'EAN-13' }">  
                                        </barcode>                                       
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Marca</label>
                                    <div class="col-md-9">
                                        <input type="email" v-model="marca" class="form-control" placeholder="Ingrese Marca del Producto">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Cantidad</label>
                                    <div class="col-md-4">
                                        <input type="number" v-model="stock" class="form-control" placeholder="">                                                     
                                    </div>
                                    <div class="col-md-4">
                                     <select class="form-control" v-model="idunidad">
                                            <option value="0" disabled>Seleccione Unidad</option>
                                            <option v-for="unidad in arrayUnidad" :key="unidad.id" :value="unidad.id" v-text="unidad.nombre"></option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Garantia</label>
                                      <div class="col-md-4">
                                      <label class="radio-inline">
                                        <input type="radio" v-model="exp" value="1"> SI
                                        <label><label></label></label>
                                        <input type="radio" v-model="exp" value="0"> NO
                                        </label>                                               
                                    </div>
                                    <div v-if="exp == 1" class="col-md-2">
                                        <input type="number" v-model="tiempo" class="form-control" placeholder="">                                                     
                                    </div>
                                    <div class="col-md-4" v-if="exp == 1">
                                     <select class="form-control" v-model="idtiempo">
                                            <option value="0" disabled>Seleccione Tiempo</option>
                                            <option v-for="tiempo in arrayTiempo" :key="tiempo.id" :value="tiempo.id" v-text="tiempo.nombre"></option>
                                        </select>
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="email-input">Descripción</label>
                                    <div class="col-md-9">
                                        <input type="email" v-model="descripcion" class="form-control" placeholder="Ingrese descripción">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Seleccione la Imagen</label>
                                    <div class="col-md-4">
                                    <input type="file" class="form-control" @change="obtimage">
                                </div>
                                <figure>
                                    <img width="200" height="200" :src="imagenm" alt="Foto del Producto">
                                </figure>
                                </div>
                              
                                <div v-show="errorArticulo" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjArticulo" :key="error" v-text="error">

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()">Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarArticulo()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarArticulo()">Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->
          </section>

</template>


<script>

    import {generateAndDownloadBarcodeInPDF} from './generateBarcode'; 
    import VueBarcode from 'vue-barcode';
    export default {
   
        data (){
            return {
                articulo_id: 0,
                idcategoria : 0,
                nombre_categoria : '',
                idunidad : 0,
                nombre_unidad : '',
                idtiempo : 0,
                nombre_tiempo : '',
                idestado : 0,
                nombre_estado : '',
                codigo : '',
                nombre : '',
                stock : 0,
                tiempo : 0,
                exp : '',
                descripcion : '',
                marca : '',
                imagenmin:'',
                imagen:'',
                arrayArticulo : [],
                listado: 1,
                modal : 0,
                tituloModal : '',
                tipoAccion : 0,
                errorArticulo : 0,
                errorMostrarMsjArticulo : [],
                pagination : {
                    'total' : 0,
                    'current_page' : 0,
                    'per_page' : 0,
                    'last_page' : 0,
                    'from' : 0,
                    'to' : 0,
                },
                arrayCategoria :[],
                arrayUnidad :[],
                arrayTiempo :[],
                arrayEstado :[],
                offset : 3,
                criterio : 'idcategoria',
                buscar : '',
                criterioA: 'nombre',
                buscarA:'',
               
            }
           
        },
        components: {
        'barcode': VueBarcode
    },
        computed:{
            imagenm(){
                return this.imagenmin;
            },
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

    generateAndDownloadBarCode(codigo,nombre_categoria) {
      generateAndDownloadBarcodeInPDF(codigo,nombre_categoria);
    },
     ocultarDetalle(){
         
         
                this.listado=1;
            },

               verArticulo(id){
                let me=this;
                me.listado=2;

               var arrayArticulo=[];
                var url= '/articulo/obtenerCabecera?id=' + id;

                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    arrayArticulo = respuesta.articulos;
                    
                    me.nombre = arrayArticulo[0]['nombre'];
                    me.codigo = arrayArticulo[0]['codigo'];
                    me.nombre_categoria = arrayArticulo[0]['nombre_categoria'];
                    me.nombre_estado = arrayArticulo[0]['nombre_estado'];
                    me.descripcion = arrayArticulo[0]['descripcion'];

                })
                .catch(function (error) {
                    console.log(error);
                });
                //obtener datos de los detalles
                 var url= '/articulo/obtenerDetalles?id=' + id;

                axios.get(url).then(function (response) {
                    console.log(response);
                    var respuesta= response.data;
                    me.arrayArticulo = respuesta.articulos;

                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            obtimage(e){
                let file = e.target.files[0];
                this.imagen = file;
                this.cargarImagen(file);
            },

            cargarImagen(file){
                let reader = new FileReader();
                reader.onload = (e) =>{
                    this.imagenmin = e.target.result;
                }
                reader.readAsDataURL(file);
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
            cargarPdf(){
                window.open('/articulo/listarPdf','_blank');
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
            selectUnidad(){
                let me=this;
                var url= '/unidad/selectUnidad';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayUnidad = respuesta.unidads;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectTiempo(){
                let me=this;
                var url= '/tiempo/selectTiempo';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayTiempo = respuesta.tiempos;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            selectEstado(){
                let me=this;
                var url= '/estado/selectEstado';
                axios.get(url).then(function (response) {
                    //console.log(response);
                    var respuesta= response.data;
                    me.arrayEstado = respuesta.estados;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            cambiarPagina(page,buscar,criterio,buscarA,criterioA){
                let me = this;
                //Actualiza la página actual
                me.pagination.current_page = page;
                //Envia la petición para visualizar la data de esa página
                me.listarArticulo(page,buscar,criterio,buscarA,criterioA);
            },
            registrarArticulo(){
                if (this.validarArticulo()){
                    return;
                }
                
                let me = this;
                let formData = new FormData();
                formData.append('idcategoria', this.idcategoria);
                formData.append('idunidad', this.idunidad);
                formData.append('idtiempo', this.idtiempo);
                formData.append('idestado', this.idestado);
                formData.append('codigo', this.codigo);
                formData.append('nombre', this.nombre);
                formData.append('stock', this.stock);
                formData.append('tiempo', this.tiempo);
                formData.append('descripcion', this.descripcion);
                formData.append('marca', this.marca);
                formData.append('imagen', this.imagen);

                axios.post('/articulo/registrar',formData).then(function (response) {
                    me.cerrarModal();
                    me.listarArticulo(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                });
            },

            actualizarArticulo(){
               if (this.validarArticulo()){
                    return;
                }
                let me = this;
                let formData = new FormData();
                formData.append('id', this.articulo_id);
                formData.append('idcategoria', this.idcategoria);
                formData.append('idunidad', this.idunidad);
                formData.append('idtiempo', this.idtiempo);
                formData.append('idestado', this.idestado);
                formData.append('codigo', this.codigo);
                formData.append('nombre', this.nombre);
                formData.append('stock', this.stock);
                formData.append('tiempo', this.tiempo);
                formData.append('descripcion', this.descripcion);
                formData.append('marca', this.marca);
                formData.append('imagen', this.imagen);

                axios.post('/articulo/actualizar',formData).then(function (response) {
                    me.cerrarModal();
                    me.listarArticulo(1,'','nombre');
                }).catch(function (error) {
                    console.log(error);
                }); 
            },
            desactivarArticulo(id){
               swal({
                title: 'Esta seguro de desactivar este artículo?',
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

                    axios.put('/articulo/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarArticulo(1,'','nombre');
                        swal(
                        'Desactivado!',
                        'El registro ha sido desactivado con éxito.',
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
            activarArticulo(id){
               swal({
                title: 'Esta seguro de activar este artículo?',
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

                    axios.put('/articulo/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarArticulo(1,'','nombre');
                        swal(
                        'Activado!',
                        'El registro ha sido activado con éxito.',
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
            validarArticulo(){
                this.errorArticulo=0;
                this.errorMostrarMsjArticulo =[];

                if (this.idcategoria==0) this.errorMostrarMsjArticulo.push("Seleccione una Area.");
                if (this.idunidad==0) this.errorMostrarMsjArticulo.push("Seleccione una unidad.");
                if (this.descripcion==0) this.errorMostrarMsjArticulo.push("Añada una descripcion .");
                if (this.idestado==0) this.errorMostrarMsjArticulo.push("Seleccione un estado.");
                if (!this.nombre){ alert('No has escrito nada en el usuario');
                    return; 
                };
                if (!this.stock) this.errorMostrarMsjArticulo.push("El stock del artículo debe ser un número y no puede estar vacío.");

                if (this.errorMostrarMsjArticulo.length) this.errorArticulo = 1;

                return this.errorArticulo;
            },

            cerrarModal(){
                this.modal=0;
                this.tituloModal='';
                this.idcategoria= 0;
                this.nombre_categoria = '';
                this.idunidad= 0;
                this.nombre_unidad = '';
                this.idtiempo= 0;
                this.nombre_tiempo = '';
                this.idestado= 0;
                this.nombre_estado = '';
                this.codigo = '';
                this.nombre = '';
                this.stock = 0;
                this.tiempo = 0;
                this.descripcion = '';
                this.marca = '';
                this.imagen = '';
		        this.errorArticulo=0;
            },
            abrirModal(modelo, accion, data = []){
                switch(modelo){
                    case "articulo":
                    {
                        switch(accion){
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Producto';
                                this.idcategoria=0;
                                this.nombre_categoria='';
                                this.idunidad=0;
                                this.nombre_unidad='';
                                this.idtiempo= 0;
                                this.nombre_tiempo = '';
                                this.idestado= 0;
                                this.nombre_estado = '';
                                this.codigo='';
                                this.nombre= '';
                                this.stock=0;
                                this.tiempo=0;
                                this.descripcion = '';
                                this.marca = '';
                                this.imagen = '';
                                this.imagenmin = '';
                                this.exp ='0';
                                this.tipoAccion = 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Producto';
                                this.tipoAccion=2;
                                this.articulo_id=data['id'];
                                this.idcategoria=data['idcategoria'];
                                this.idunidad=data['idunidad'];
                                this.idtiempo=data['idtiempo'];
                                this.idestado=data['idestado'];
                                this.codigo=data['codigo'];
                                this.nombre = data['nombre'];
                                this.stock=data['stock'];
                                this.tiempo=data['tiempo'];
                                this.descripcion= data['descripcion'];
                                this.marca= data['marca'];
                                this.imagen= data[''];
                                this.exp= '1';
                                this.imagenmin= data['imagenm'];
                                break;
                            }
                        }
                    }
                }
                this.selectCategoria();
                this.selectUnidad();
                this.selectTiempo();
                this.selectEstado();
            }
        },
        mounted() {
            this.selectCategoria();
            this.listarArticulo(1,this.buscar,this.criterio,this.buscarA,this.criterioA);
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
    .orders-component-title {
    margin: 40px 0px;
    font-weight: bold;
    line-height: 24px;
    text-decoration: underline;
    }

    .black-color {
    color: black;
    }
    .fa-2xd {
    font-size: 31px;
}

</style>
