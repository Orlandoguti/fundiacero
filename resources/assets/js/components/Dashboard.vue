<template v-if="listado==0">
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Escritorio</a></li>
    </ol>
    <div class="container-fluid">
        <ul class="ulbar">
            <li  class="libar"><a class="activebar" @click="mostrarIngresosdespacho()">INGRESOS Y DESPACHOS</a></li>
            <li  class="libar"><a @click="mostrarPedido()">PEDIDOS</a></li>
            <li  class="libar"><a @click="mostrarProductos()">PRODUCTOS</a></li>
        </ul>   
          
    <template v-if="listado==1">
          <div class="card">
                <div class="card-header">
                            <div class="col-md-4">
                                
                                <select class="form-control col-md-13" v-model="listado">
                                            <option value="0" disabled>Seleccione Tipo de Grafico</option>
                                            <option value="7"> Grafico de Barras</option>
                                            <option value="2">Grafico de Lineas</option>  
                                             <option value="1">Productos Mas Despachados e Ingresados</option>                                           
                                </select>
                            </div>
                </div>
                 </div>
         <div class="border">
        <div class="control-section">
            <div align="center">
      <ejs-chart
        style="display:block"
        :theme="theme"
        :primaryXAxis='primaryXAxisbard' :primaryYAxis='primaryYAxisbard'
        ref="chart"
        align="center"
        id="chartcontainerR"
        :title="titlebarrade"
        :chartArea="chartArea"
        :width="width"
        :tooltip="tooltip"
        :legendSettings="legendSettings"
        :pointRender="pointRender"       
        :loaded="loaded"
      >
        <e-series-collection>
          <e-series
            :dataSource="mas_ingresados"
            type="Column"
            xName="nombre"
            yName="TotalIngresos"
            name="Ingresos"
            width="2"
            :marker="marker"
            :cornerRadius="cornerRadius"
          ></e-series>
        </e-series-collection>
      </ejs-chart>
    </div>
     </div>
       </div>
     <div class="border">
         <div class="control-section">
            <div align="center">
      <ejs-chart
        style="display:block"
        :theme="theme"
        :primaryXAxis='primaryXAxisbard' :primaryYAxis='primaryYAxisbard'
        ref="chart"
        align="center"
        id="chartcontainerRdespacho"
        :title="titlebarradep"
        :chartArea="chartArea"
        :width="width"
        :tooltip="tooltip"
        :legendSettings="legendSettings"
        :pointRender="pointRender"       
        :loaded="loaded"
      >
        <e-series-collection>
          <e-series
           
            type="Column"
            xName=""
            yName=""
            name=""
            width="2"
            :marker="marker"
            :cornerRadius="cornerRadius"
          ></e-series>
           <e-series
            :dataSource="mas_vendidos"
            type="Column"
            xName="nombre"
            yName="TotalVentas"
            name="Despachos"
            width="2"
            :marker="marker"
            :cornerRadius="cornerRadius"
          ></e-series>
        </e-series-collection>
      </ejs-chart>
    </div>
     </div>
     </div>
     </template>
     <template v-if="listado==7">
              <div class="card">
                <div class="card-header">
                            <div class="col-md-4">
                                
                                <select class="form-control col-md-13" v-model="listado">
                                            <option value="0" disabled>Seleccione Tipo de Grafico</option>
                                            <option value="7"> Grafico de Barras</option>
                                            <option value="2">Grafico de Lineas</option>  
                                             <option value="1">Productos Mas Despachados e Ingresados</option>                                           
                                </select>
                            </div>
                </div>
                 </div>
         <div class="border">
        <div class="control-section">
            <div align="center">
      <ejs-chart
        style="display:block"
        :theme="theme"
        :primaryXAxis='primaryXAxisbar' :primaryYAxis='primaryYAxisbar'
        ref="chart"
        align="center"
        id="chartcontainerR"
        :title="titlebarrai"
        :chartArea="chartArea"
        :width="width"
        :tooltip="tooltip"
        :legendSettings="legendSettings"
        :pointRender="pointRender"       
        :loaded="loaded"
      >
        <e-series-collection>
          <e-series
            :dataSource="detalle_ingresos"
            type="Column"
            xName="fecha"
            yName="totalc"
            name="Ingresos"
            width="2"
            :marker="marker"
            :cornerRadius="cornerRadius"
          ></e-series>
        </e-series-collection>
      </ejs-chart>
    </div>
     </div>
       </div>
     <div class="border">
         <div class="control-section">
            <div align="center">
      <ejs-chart
        style="display:block"
        :theme="theme"
        :primaryXAxis='primaryXAxisbarde' :primaryYAxis='primaryYAxisbarde'
        ref="chart"
        align="center"
        id="chartcontainerRdespacho"
        :title="titlebarrav"
        :chartArea="chartArea"
        :width="width"
        :tooltip="tooltip"
        :legendSettings="legendSettings"
        :pointRender="pointRender"       
        :loaded="loaded"
      >
        <e-series-collection>
          <e-series
           
            type="Column"
            xName=""
            yName=""
            name=""
            width="2"
            :marker="marker"
            :cornerRadius="cornerRadius"
          ></e-series>
           <e-series
            :dataSource="detalle_ventas"
            type="Column"
            xName="fecha"
            yName="totalv"
            name="Despachos"
            width="2"
            :marker="marker"
            :cornerRadius="cornerRadius"
          ></e-series>
        </e-series-collection>
      </ejs-chart>
    </div>
     </div>
     </div>
     </template>

     <template v-if="listado==2">
          <div class="card">
                <div class="card-header">
                            <div class="col-md-4">
                                
                                <select class="form-control col-md-13" v-model="listado">
                                            <option value="0" disabled>Seleccione Tipo de Grafico</option>
                                            <option value="7"> Grafico de Barras</option>
                                            <option value="2">Grafico de Lineas</option>
                                            <option value="1">Productos Mas Despachados e Ingresados</option>                                            
                                </select>
                            </div>
                </div>
                 </div>
         <div class="border">
            <div class="control-section">
    <div align='center'>
        <ejs-chart style='display:block' :theme='theme' align='center' id='chartcontainer' :title='titlelineai' :primaryXAxis='primaryXAxis' :primaryYAxis='primaryYAxis'
            :tooltip='tooltip' :chartArea='chartArea' :width='width'>
            <e-series-collection>
                <e-series :dataSource='detalle_ingresos' type='Line' xName='fecha' yName='totalc' name='Ingresos' width=2 :marker='marker'> </e-series>
            </e-series-collection>
        </ejs-chart>
    </div>
     </div>
     </div>
     <div class="border">
         <div class="control-section">
    <div align='center'>
        <ejs-chart style='display:block' :theme='theme' align='center' id='chartcontainerdespacho' :title='titlelineav' :primaryXAxis='primaryXAxis' :primaryYAxis='primaryYAxis'
            :tooltip='tooltip' :chartArea='chartArea' :width='width'>
            <e-series-collection>
                 <e-series :dataSource='detalle_ventas' type='Line' xName='' yName='' name='' width=2 :marker='marker'> </e-series>  
                 <e-series :dataSource='detalle_ventas' type='Line' xName='fecha' yName='totalv' name='Despachos' width=2 :marker='marker'> </e-series>    
            </e-series-collection>
        </ejs-chart>
    </div>
        </div>
     </div>
    

        </template>
        <template v-if="listado==3">
          <div class="card">
                <div class="card-header">
                            <div class="col-md-4">
                                
                                <select class="form-control col-md-13" v-model="listado">
                                            <option value="0" disabled>Seleccione Tipo de Grafico</option>
                                            <option value="3"> Grafico de Barras</option>
                                            <option value="4">Grafico de Lineas</option>                                            
                                </select>
                            </div>
                </div>
                 </div>
         <div class="border">
        <div class="control-section">
            <div align="center">
      <ejs-chart
        style="display:block"
        :theme="theme"
        :primaryXAxis='primaryXAxisbarp' :primaryYAxis='primaryYAxisbarp'
        ref="chart"
        align="center"
        id="chartcontainerR"
        :title="titlebarrap"
        :chartArea="chartArea"
        :width="width"
        :tooltip="tooltip"
        :legendSettings="legendSettings"
        :pointRender="pointRender"       
        :loaded="loaded"
      >
        <e-series-collection>
          <e-series
            :dataSource="detalle_pedidos"
            type="Column"
            xName="fecha"
            yName="totalp"
            name="Pedidos"
            width="2"
            :marker="marker"
            :cornerRadius="cornerRadius"
          ></e-series>
        </e-series-collection>
      </ejs-chart>
    </div>
     </div>
       </div>
     </template>

     <template v-if="listado==4">
          <div class="card">
                <div class="card-header">
                            <div class="col-md-4">
                                
                                <select class="form-control col-md-13" v-model="listado">
                                            <option value="0" disabled>Seleccione Tipo de Grafico</option>
                                            <option value="3"> Grafico de Barras</option>
                                            <option value="4">Grafico de Lineas</option>                                            
                                </select>
                            </div>
                </div>
                 </div>
         <div class="border">
            <div class="control-section">
    <div align='center'>
        <ejs-chart style='display:block' :theme='theme' align='center' id='chartcontainer' :title='titlelineap' :primaryXAxis='primaryXAxispe' :primaryYAxis='primaryYAxispe'
            :tooltip='tooltip' :chartArea='chartArea' :width='width'>
            <e-series-collection>
                <e-series :dataSource='productos' type='Line' xName='fecha' yName='totalp' name='Pedidos' width=2 :marker='marker'> </e-series>
            </e-series-collection>
        </ejs-chart>
    </div>
     </div>
     </div>
        </template>
            <template v-if="listado==6">
                <div class="card">
                    <div class="card-header">
                                <div class="col-md-4">
                                    
                                    <select class="form-control col-md-13" v-model="listado">
                                                <option value="0" disabled>Seleccione Tipo de Grafico</option>
                                                <option value="5"> Grafico de Productos</option>
                                                <option value="6">Grafico de Productos por Area</option>                                            
                                    </select>
                                </div>
                    </div>
                    </div>
                <div class="control-section">
                    <div class="control-section">
                        <ejs-accumulationchart id="containerprod" ref="pie" style='display:block;' :theme='theme' :legendSettings="legendSettings" :tooltip="tooltip" :enableAnimation='enableAnimation' :enableSmartLabels='enableSmartLabels' >
                            <e-accumulation-series-collection>
                                <e-accumulation-series  :dataSource='articulos' xName='nombre' yName='stock' :radius=radius innerRadius="20%" :dataLabel="dataLabel"> </e-accumulation-series>
                            </e-accumulation-series-collection>
                        </ejs-accumulationchart>

                    </div>

                </div>
        </template>
        <template v-if="listado==5">
                     <div class="card">
                        <div class="card-header">
                                <div class="col-md-4">
                                    
                                    <select class="form-control col-md-13" v-model="listado">
                                                <option value="0" disabled>Seleccione Tipo de Grafico</option>
                                                <option value="5"> Grafico de Productos</option>
                                                <option value="6">Grafico de Productos por Area</option>                                            
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="control-section">
                        <div align='center'>
                            <ejs-chart style='display:block' :theme='theme' align='center' id='chartcontainer' :title='title' :primaryXAxis='primaryXAxispro' :primaryYAxis='primaryYAxispro'
                                :chartArea='chartArea' :width='width'  :tooltip='tooltip' :legendSettings='legendSettings'>
                                <e-series-collection>
                                    <e-series :dataSource='productos' type='Column' xName='stock' yName='nombre' name='Germany'> </e-series>
                                    <e-series :dataSource='productos' type='Line' xName='stock' yName='nombre' name='Japan' width=2 :marker='marker'> </e-series>
                                </e-series-collection>
                            </ejs-chart>
                        </div>
                    </div>
            </template>

    </div>
</main>
</template>
<style scoped>
</style>
<script>
import Vue from "vue";
import { Browser } from '@syncfusion/ej2-base';
import {BarSeries,Category,ChartPlugin, LineSeries, Legend, Tooltip, DateTime,
  ColumnSeries,DataLabel,AccumulationChartPlugin, AccumulationLegend, PieSeries, AccumulationDataLabel, AccumulationTooltip } from "@syncfusion/ej2-vue-charts";
Vue.use(AccumulationChartPlugin);

Vue.use(ChartPlugin);
let selectedTheme = location.hash.split("/")[1];
selectedTheme = selectedTheme ? selectedTheme : "Material";
let theme = (selectedTheme.charAt(0).toUpperCase() + selectedTheme.slice(1)).replace(/-dark/i, "Dark");

    export default {
        data (){
            return {
                listado:1,
                theme: theme,
                detalle_ingresos:[],
                articulos:[],
                detalle_pedidos:[],
                detalle_ventas:[],
            replace:'',
        
            mas_vendidos: [],
            mas_ingresados: [],
                
     primaryXAxisbar: {
         valueType : "DateTime" ,
         labelFormat : "d/MM/y" ,
         intervalType : "Days" ,
         edgeLabelPlacement : "Shift" ,
         majorGridLines : { width : 0 }},
       // Inicializando el eje Y primario 
      //Initializing Primary Y Axis
      primaryYAxisbar: {
        labelFormat: "{value}",
        rangePadding: "None",
        minimum: 0,
        maximum: 10,
        interval: 2,
        lineStyle: { width: 0 },
        majorTickLines: { width: 0 },
        minorTickLines: { width: 0 }
      },

         primaryXAxisbarde: {
         valueType : "DateTime" ,
         labelFormat : "d/MM/y" ,
         intervalType : "Days" ,
         edgeLabelPlacement : "Shift" ,
         majorGridLines : { width : 0 }},
       // Inicializando el eje Y primario 
      //Initializing Primary Y Axis
      primaryYAxisbarde: {
        labelFormat: "{value}",
        rangePadding: "None",
        minimum: 0,
        maximum: 10,
        interval: 2,
        lineStyle: { width: 0 },
        majorTickLines: { width: 0 },
        minorTickLines: { width: 0 }
      },

         primaryXAxisbard: {
         valueType : "Category" ,
         edgeLabelPlacement : "Shift" ,
         majorGridLines : { width : 0 }},
       // Inicializando el eje Y primario 
      //Initializing Primary Y Axis
      primaryYAxisbard: {
        labelFormat: "{value}",
        rangePadding: "None",
        minimum: 0,
        maximum: 20,
        interval: 2,
        lineStyle: { width: 0 },
        majorTickLines: { width: 0 },
        minorTickLines: { width: 0 }
      },

        primaryXAxisbarp: {
         valueType : "DateTime" ,
         labelFormat : "d/MM/y" ,
         intervalType : "Days" ,
         edgeLabelPlacement : "Shift" ,
         majorGridLines : { width : 0 }},
       // Inicializando el eje Y primario 
      //Initializing Primary Y Axis
      primaryYAxisbarp: {
        labelFormat: "{value}",
        rangePadding: "None",
        minimum: 0,
        maximum: 50,
        interval: 2,
        lineStyle: { width: 0 },
        majorTickLines: { width: 0 },
        minorTickLines: { width: 0 }
      },

      //Initializing Primary Y Axis
      primaryYAxispe: {
        labelFormat: "{value}",
        rangePadding: "None",
        minimum: 0,
        maximum: 50,
        interval: 2,
        lineStyle: { width: 0 },
        majorTickLines: { width: 0 },
        minorTickLines: { width: 0 }
      },
       primaryXAxispe: {
         valueType : "DateTime" ,
         labelFormat : "d/MM/y" ,
         intervalType : "Days" ,
         edgeLabelPlacement : "Shift" ,
         majorGridLines : { width : 0 }},
       // Inicializando el eje Y primario 
      //Initializing Primary Y Axis
     
        primaryXAxispro: {
            valueType: 'Category',
            majorGridLines: { width: 0 },
        },


      //Initializing Primary Y Axis
        primaryYAxispro:
        {
            minimum: 0, maximum: 100, interval: 20,
            lineStyle: { width: 0 },
            labelFormat: '{value}'
        },
  
       markerpro: { visible: true, width: 10, height: 10, border: { width: 2, color: '#F8AB1D' } },
       width: Browser.isDevice ? '100%' : '60%',
       tooltip: { enable: true },
        legendSettings: {
            visible: false
        },
        chartArea: {
        border: {
          width: 0
        }
      },
      width : Browser.isDevice ? '100%' : '60%',
      marker: {
        visible: true,
        height: 10,
        width: 10
      },
      tooltip: {
        enable: true
      },

     legendSettings: { visible: true },
     dataLabel: { visible: true, position: 'Outside', name: 'nombre'},
   
     enableAnimation: true,
     enableSmartLabels: true,
	
      
      titlelineai: "Grafico de Lineas Ingresos  por dia",
       titlelineav: "Grafico de Lineas Despachos por dia",
       titlebarrai: "Grafico de Barras Ingresos por dia",
        titlebarrav: "Grafico de Barras Despachos por dia",
        titlebarrap: "Grafico de Barras Pedidos por dia",
        titlebarrap: "Grafico de Barras Pedidos por dia",
         titlebarrade: "Grafico de Productos mas Ingresados",
        titlebarradep: "Grafico de Productos mas Despachados"
    };
  },
  
  provide: {
    chart: [BarSeries, Category,ColumnSeries, DataLabel, LineSeries, Legend, Tooltip, DateTime],
    accumulationchart: [AccumulationLegend, PieSeries, AccumulationDataLabel, AccumulationTooltip]
  },

    methods : {
        getMasIngresados() {
            let me=this;
            var url = '/dashboard';
            axios.get(url).then(function (response) {
                var respuesta= response.data;
                me.mas_ingresados = respuesta.mas_ingresados;
                console.log(me.mas_ingresados);
            })
            .catch(function (error) {
                console.log(error);
            });

        },

        getMasVendidos() {
            let me=this;
            var url = '/dashboard';
            axios.get(url).then(function (response) {
                var respuesta= response.data;
                me.mas_vendidos = respuesta.mas_vendidos;
                console.log(me.mas_vendidos);
            })
            .catch(function (error) {
                console.log(error);
            });

        },
        mostrarIngresosdespacho(){
                this.listado=1;
            },
              mostrarPedido(){
                this.listado=3;
            },
               mostrarProductos(){
                this.listado=5;
            },
             mostrarProductos2(){
                this.listado=6;
            },
      getProductos(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.articulos = respuesta.articulos;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
      
              getDetalleIngresos(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.detalle_ingresos = respuesta.detalle_ingresos;
                    //cargamos los datos del chart
                    me.loadDIngresos();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getDetallepedidos(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.detalle_pedidos = respuesta.detalle_pedidos;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            getDetalleVentas(){
                let me=this;
                var url= '/dashboard';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.detalle_ventas = respuesta.detalle_ventas;
                    //cargamos los datos del chart
                    me.loadVentas();
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        },
        mounted() {
            this.getMasIngresados();
            this.getMasVendidos();
            this.getDetalleVentas();
            this.getDetalleIngresos();
            this.getDetallepedidos();
            this.getProductos();
        }
    }
</script>
<style>
.border{
    border: double;
}

</style>
