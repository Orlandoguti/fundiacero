<template>
  <div class="control-section">
    <div align='center'>
        <ejs-chart style='display:block' :theme='theme' align='center' id='chartcontainer' :title='title' :primaryXAxis='primaryXAxis' :primaryYAxis='primaryYAxis'
            :tooltip='tooltip' :chartArea='chartArea' :width='width'>
            <e-series-collection>
                <e-series :dataSource='seriesData' type='Line' xName='x' yName='y' name='Germany' width=2 :marker='marker'> </e-series>
                <e-series :dataSource='seriesData1' type='Line' xName='x' yName='y' name='England' width=2 :marker='marker'> </e-series>
            </e-series-collection>
        </ejs-chart>
    </div>

</div>
</template>
<style scoped>

</style>
<script>
import Vue from "vue";
import { Browser } from '@syncfusion/ej2-base';
import { ChartPlugin, LineSeries, Legend, Tooltip, DateTime } from "@syncfusion/ej2-vue-charts";

Vue.use(ChartPlugin);

let selectedTheme = location.hash.split("/")[1];
selectedTheme = selectedTheme ? selectedTheme : "Material";
let theme = (selectedTheme.charAt(0).toUpperCase() + selectedTheme.slice(1)).replace(/-dark/i, "Dark");

export default Vue.extend({
  data: function() {
    return {
      theme: theme,
    
      //Initializing Primary X Axis
      primaryXAxis: {
        valueType: "DateTime",
        labelFormat: "y",
        intervalType: "Years",
        edgeLabelPlacement: "Shift",
        majorGridLines: { width: 0 }
      },
      //Initializing Primary Y Axis
      primaryYAxis: {
        labelFormat: "{value}%",
        rangePadding: "None",
        minimum: 0,
        maximum: 100,
        interval: 20,
        lineStyle: { width: 0 },
        majorTickLines: { width: 0 },
        minorTickLines: { width: 0 }
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
      title: "Inflation - Consumer Price"
    };
  },
  provide: {
    chart: [LineSeries, Legend, Tooltip, DateTime]
  },
  methods: {
      listarIngreso (page,buscar,criterio){
                let me=this;
                var url= '/ingreso?page=' + page + '&buscar='+ buscar + '&criterio='+ criterio;
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.arrayIngreso = respuesta.ingresos.data;
                    me.pagination= respuesta.pagination;
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
  }
   
});
</script>