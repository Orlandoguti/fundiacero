<template>
<main class="main">
  <ol class="breadcrumb">
        
    </ol>


	<!-- pageContent -->
	<section class="">
			<section class="full-width header-well">
                           <div class="full-width header-well-icon">
                               <img src="/imagenes/icono.png" width="60" height="60" class="icono-fundi">
                            </div>
							<div class="full-width header-well-text">
							<p class="text-condensedLight ">Seccion Principal Fundiciones Fundiacero S.A.</p>
							</div>
                </section>
		<section class="full-width" style="margin: 30px 0;">
			<img src="/imagenes/Captura.png" width="300" class="logofundi">
			<!-- TimeLine -->
			<div id="timeline-c" class="timeline-c">
				<div class="timeline-c-box">
	                  <div class="timeline-c-box-icon bg-primary">
	                    <i class="zmdi zmdi-library"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Dashboard</h4>
	                    <p class="text-center">
	                    	La Seccion de Dashboard Contiene graficos del Sistema como tal Productos por Area , Productos total , Ingresos, Despachos y Pedidos al dia, Productos mas Despachados e Ingresados.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i><span v-text="fechaActual"></span></span>
	                </div>
	            </div>
				<div class="timeline-c-box">
	              <div class="timeline-c-box-icon bg-primary">
	                    <i class="zmdi zmdi-library"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Areas</h4>
	                    <p class="text-center">
	                    	La Seccion de areas Contiene todas Las areas de que conprende la empresa Fundiacero S.A. con los respectivos nombres de los encargados de Area.
	                    </p>
                        
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i><span v-text="fechaActual"></span></span>
	                </div>
	            </div>
	            <div class="timeline-c-box">
	                  <div class="timeline-c-box-icon bg-primary">
	                    <i class="zmdi zmdi-library"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight"> </h4>
	                    <p class="text-center">
	                    	La seccion de Almacen Contiene todos los productos de la Empresa Fundiacero S.A. con sus respectivos datos y detalles que tenga dicho producto como tambien se hace una generacion de reporte de todos los productos Tambien Contiene la Seccion de Pedidos de Productos.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i><span v-text="fechaActual"></span></span>
	                </div>
	            </div>
	            <div class="timeline-c-box">
	                  <div class="timeline-c-box-icon bg-primary">
	                    <i class="zmdi zmdi-library"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Administracion</h4>
	                    <p class="text-center">
	                    	La seccion de Administracion contiene todos los registros de los Usuarios o Encargados de las distintas areas donde el Administrador es el unico que prodra gestionar todo el proceso de registro o eliminado.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i><span v-text="fechaActual"></span></span>
	                </div>
	            </div>
                 <div class="timeline-c-box">
	              <div class="timeline-c-box-icon bg-primary">
	                    <i class="zmdi zmdi-library"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Acciones</h4>
	                    <p class="text-center">
	                    	La seccion de Acciones contiene el registro de Ingresos y Despachos de productos que se aran en la Empresa Fundiacero con la respectiva informacion detallada de todo el proceso.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i><span v-text="fechaActual"></span></span>
	                </div>
	            </div>
                 <div class="timeline-c-box">
	                  <div class="timeline-c-box-icon bg-primary">
	                    <i class="zmdi zmdi-library"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Reportes</h4>
	                    <p class="text-center">
	                    	La seccion de Reportes contiene la informacion de todos los procesos que se hacen en el Sistema como ser los Ingresos, Pedidos y Despachos que se hacen en la Empresa teniendo en cuenta que todo los registro se lo pueden descargar en pdf.	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i><span v-text="fechaActual"></span></span>
	                </div>
	            </div>
			</div>
             <footer class="datos" >
            <div class="">
	                    <i class="zmdi zmdi-whatsapp">
                        </i>
              <span>69849349 - Orlando Marvin Gutierrez Hidalgo </span>
              <p> </p>
              <p></p>
              <i class="zmdi zmdi-wrench">
                        </i>
                        <span>Soporte Tecnico</span>
	                </div>
        </footer>
		</section>
       
	</section>
</main>
</template>
<script>
    export default {
        data (){
            return {
                fechaActual:[],
            }
        },
        methods : {
            getfecha(){
                let me=this;
                var url= '/home';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.fechaActual = respuesta.fechaActual;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
            
        },
        mounted() {
            this.getfecha();
          
        }
    }
</script>
<style>
.datos{
    text-align: center;
}
.logofundi{
    align-content: center;
    margin-left: 35%;
}
</style>


