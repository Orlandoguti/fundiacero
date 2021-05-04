 <!-- Proyecto Fundiacero Realiado por Ingeniero: Orlando Marvin Gutierrez Hidalgo -->
 <!-- Sistema Realizado el 2021 -->
 <!-- Universidad Privada Franz Tamayo -->

<template>
<section class="full-width navLateral">
		<section class="full-width container-notifications">
			<div class="full-width container-notifications-bg btn-Notification"></div>
			<section class="NotificationArea">				
				<div  class="full-width text-center NotificationArea-title tittles">Notificaciones <i class="zmdi zmdi-close btn-Notification"></i></div>
				
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-sm" >
                                    <thead>
                                        <tr>
											  <th>Nombre</th>
                                             <th>Stock Producto</th>
											
                                           
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="articulo in arrayArticulo" :key="articulo.id">
											 <td v-text="articulo.nombre">
                                           </td>
                                             <td v-show="articulo.stock <= 3">
                                                
                                           </td>
                                        </tr>
                                    </tbody>  
            
                                </table>
								</div>
				<a href="#" class="Notification" id="notifation-unread-1">
					<div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
					
					<div   class="Notification-text">
                     	<p>
							<i class="zmdi zmdi-circle"></i>
							<strong>Despachos</strong> 
							<br>
							<small>8</small>
						</p>
					</div>
					<div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-1">Notification as UnRead</div> 
				</a>
				<a href="#" class="Notification" id="notifation-read-1">
					<div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
					<div class="Notification-text">
						<p>
							<i class="zmdi zmdi-circle-o"></i>
							<strong>New Updates</strong> 
							<br>
							<small>30 Mins Ago</small>
						</p>
					</div>
					<div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-1">Notification as Read</div>
				</a>
				<a href="#" class="Notification" id="notifation-unread-2">
					<div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
					<div class="Notification-text">
						<p>
							<i class="zmdi zmdi-circle"></i>
							<strong>Archive uploaded</strong> 
							<br>
							<small>31 Mins Ago</small>
						</p>
					</div>
					<div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-2">Notification as UnRead</div>
				</a> 
				<a href="#" class="Notification" id="notifation-read-2">
					<div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
					<div class="Notification-text">
						<p>
							<i class="zmdi zmdi-circle-o"></i>
							<strong>New Mail</strong> 
							<br>
							<small>37 Mins Ago</small>
						</p>
					</div>
					<div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-2">Notification as Read</div>
				</a>
				<a href="#" class="Notification" id="notifation-read-3">
					<div class="Notification-icon"><i class="zmdi zmdi-folder bg-primary"></i></div>
					<div class="Notification-text">
						<p>
							<i class="zmdi zmdi-circle-o"></i>
							<strong>Folder delete</strong> 
							<br>
							<small>1 hours Ago</small>
						</p>
					</div>
					<div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-3">Notification as Read</div>
				</a>  
			</section>
		</section>
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> Inventory 
			</div>
			<figure class="full-width navLateral-body-tittle-menu">
				<div>
					<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption>
					<span>
						Full Name Admin<br>
						<small>Admin</small>
					</span>
				</figcaption>
			</figure>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="home.html" class="full-width">
							<div class="navLateral-body-cl">
							<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr">
								HOME
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr">
								ADMINISTRATION
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="company.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-balance"></i>
									</div>
									<div class="navLateral-body-cr">
										COMPANY
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="providers.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr">
										PROVIDERS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="payments.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-card"></i>
									</div>
									<div class="navLateral-body-cr">
										PAYMENTS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="categories.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-label"></i>
									</div>
									<div class="navLateral-body-cr">
										CATEGORIES
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr">
								USERS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="admin.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr">
										ADMINISTRATORS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="client.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr">
										CLIENT
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="products.html" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-washing-machine"></i>
							</div>
							<div class="navLateral-body-cr">
								PRODUCTS
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="sales.html" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
							<div class="navLateral-body-cr">
								SALES
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="inventory.html" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-store"></i>
							</div>
							<div class="navLateral-body-cr">
								INVENTORY
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr">
								SETTINGS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr">
										OPTION
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="#!" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr">
										OPTION
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
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
                swal({
                title: 'Esta seguro de Registrar este Producto?',
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
                 swal(
                        'Registrado!',
                        'El Producto se ha sido registrado con éxito.',
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
            actualizarArticulo(){
               if (this.validarArticulo()){
                    return;
                }
                swal({
                title: 'Esta seguro de Actualizar este Producto?',
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
             swal(
                        'Actualizado!',
                        'El Producto se ha sido actualizado con éxito.',
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
                 swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Seleccione Una Area!',
                        })
                if (this.idcategoria==0) {
                     swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Seleccione Una Area!',
                        })
                }else{
                   if (this.idunidad==0){
                        swal({
                       type: 'error',
                       title: 'Error...',
                       text: 'Seleccione Una Unidad de Medida!',
                        })
                   }else{
                       if (this.codigo==0){
                              swal({
                       type: 'error',
                       title: 'Error...',
                       text: '!Añada Un Codigo de Producto!',
                        })
                       }else{
                           if (this.descripcion==0) {
                                 swal({
                       type: 'error',
                       title: 'Error...',
                       text: '!Añada Una descripcion de Producto!',
                        })
                           }else{
                                if (this.idestado==0) {
                                           swal({
                                    type: 'error',
                                    title: 'Error...',
                                    text: '!Seleccione Un Estado de Producto!',
                                        })  
                                }else{
                                    if (this.nombre==0) {
                                                swal({
                                    type: 'error',
                                    title: 'Error...',
                                    text: '!No has escrito nada en el Nombre de Producto!',
                                        }) 
                                    }else{
                                          if (!this.stock){
                                                  swal({
                                    type: 'error',
                                    title: 'Error...',
                                    text: '!La Cantidad del producto debe ser un número y no puede estar vacío.!',
                                        })    
                                          } 
                                    }
                               
                           }
                           
                       } 
                       
                   }
                }
  }
                if (this.idcategoria==0) this.errorMostrarMsjArticulo.push("");
                if (this.idunidad==0) this.errorMostrarMsjArticulo.push("");
                if (this.codigo==0) this.errorMostrarMsjArticulo.push("");
                if (this.descripcion==0) this.errorMostrarMsjArticulo.push("");
                if (this.idestado==0) this.errorMostrarMsjArticulo.push("");
                if (this.nombre==0)this.errorMostrarMsjArticulo.push('');
                if (!this.stock) this.errorMostrarMsjArticulo.push("");

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
                                this.imagen= data['imagen'];
                                this.exp= '1';
                                this.imagenm= data['imagenm'];
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