
/**Grafica 2 */
peti=async function () {
  var ctx = document.getElementById('myChart')
var myChart = new Chart(ctx, {
    type:'bar',
    data:{
        datasets: [{
            label: 'Estatus tickets',
            backgroundColor: ['#009288','#f26e50','#232f3f','#fce7e6','#0c5460','#f26e50'],
            borderColor: ['black'],
            borderWidth:1
        }]
    },
    options:{
        scales:{
            y:{
                beginAtZero:true
            }
        }
    }
})
await axios.get(base_url+'/admin/acceso/estatus').then((response) => {
  console.log(response.data[0])
  var etiquetas3=Object.keys(response.data[0]);
  var valores3=Object.values(response.data[0]);

    for (var i = 0; i < etiquetas3.length; i++) {

      myChart.data['labels'].push(etiquetas3[i])
      
    }

    for (var i = 0; i < valores3.length; i++) {
      myChart.data['datasets'][0].data.push(valores3[i])
      
    }
    myChart.update()
    console.log(myChart.data)
  
})
.catch(function (error) {
  console.log(error);
});
}
/**Termina grafica 2 */

/**
 * Grafica 3
 */

 peti2=async function () {

            
              
            
          
  /**
* Este es otro chart
*/

var ctx = document.getElementById('myChart2')
var myChart2 = new Chart(ctx, {
   type:'bar',
   data:{
       datasets: [{
           label: 'Preguntas por edad',
           backgroundColor: ['#009288','#f26e50','#232f3f','#fce7e6','#0c5460'],
           borderColor: ['black'],
           borderWidth:1
       }]
   },
   options:{
       scales:{
           y:{
               beginAtZero:true
           }
       }
   }
})

await axios.get(base_url+'/admin/acceso/edades').then((response) => {
 console.log(response.data[0])
 //myChart.data.datasets.pop();
 
 var etiquetas4=Object.keys(response.data[0]);
 var valores4=Object.values(response.data[0]);

   for (var i = 0; i < etiquetas4.length; i++) {

    myChart2.data['labels'].push(etiquetas4[i])
     
   }

   for (var i = 0; i < valores4.length; i++) {
    myChart2.data['datasets'][0].data.push(valores4[i])
     
   }
   myChart2.update();
   console.log(myChart.data)
 
})
.catch(function (error) {
 console.log(error);
});

 /**aqui termina el otro chart */


 
 
}

/**Termina grafica 3 */


/**Grafica 4 */
peti3=async function () {
  var ctx = document.getElementById('myChart3')
var myChart4 = new Chart(ctx, {
    type:'bar',
    data:{
        datasets: [{
            label: 'Preguntas por modalidad',
            backgroundColor: ['#009288','#f26e50','#232f3f','#fce7e6','#0c5460'],
            borderColor: ['black'],
            borderWidth:1
        }]
    },
    options:{
        scales:{
            y:{
                beginAtZero:true
            }
        }
    }
})
await axios.get(base_url+'/admin/acceso/modalidad').then((response) => {
  console.log(response.data[0])
  var etiquetas3=Object.keys(response.data[0]);
  var valores3=Object.values(response.data[0]);

    for (var i = 0; i < etiquetas3.length; i++) {

      myChart4.data['labels'].push(etiquetas3[i])
      
    }

    for (var i = 0; i < valores3.length; i++) {
      myChart4.data['datasets'][0].data.push(valores3[i])
      
    }
    myChart4.update()
    console.log(myChart4.data)
  
})
.catch(function (error) {
  console.log(error);
});
}
/**Termina grafica 4 */


/**Grafica 5 */
peti4=async function () {
  var ctx = document.getElementById('myChart4')
var myChart4 = new Chart(ctx, {
    type:'bar',
    data:{
        datasets: [{
            label: 'Preguntas por consultante',
            backgroundColor: ['#009288','#f26e50','#232f3f','#fce7e6','#0c5460'],
            borderColor: ['black'],
            borderWidth:1
        }]
    },
    options:{
        scales:{
            y:{
                beginAtZero:true
            }
        }
    }
})
await axios.get(base_url+'/admin/acceso/consultante').then((response) => {
  console.log(response.data[0])
  var etiquetas3=Object.keys(response.data[0]);
  var valores3=Object.values(response.data[0]);

    for (var i = 0; i < etiquetas3.length; i++) {

      myChart4.data['labels'].push(etiquetas3[i])
      
    }

    for (var i = 0; i < valores3.length; i++) {
      myChart4.data['datasets'][0].data.push(valores3[i])
      
    }
    myChart4.update()
    console.log(myChart4.data)
  
})
.catch(function (error) {
  console.log(error);
});
}
/**Termina grafica 4 */



        window.addEventListener("load", function(event) {
            /**Cargar las graficas */        
                peti();
                peti2();
                peti3(); 
                peti4();                  
        });
          
        
         


Vue.component('grafica1', {
  extends: VueChartJs.Pie,
  props: ['barData', 'chartOptions'],
  
  mounted(){
    this.renderChart(this.barData, this.chartOptions);
  },
  /*watch: {
    barData () {
      console.log('bar data changed')
      this.renderChart(this.barData, this.chartOptions);
  },
    chartOptions () {
      this.renderChart(this.barData, this.chartOptions);
   }
  }*/
}, {
    responsive: true, 
    maintainAspectRatio: false
  })


  

  
  


  

new Vue({
el: "#app2",
vuetify: new Vuetify(),
data() {
  return {
  ChartConfig: {
    labels: [],
    datasets: [
      {
        data: [],
        backgroundColor: ['#009288','#f26e50','#232f3f','#fce7e6','#0c5460'],
        borderColor: 'rgba(136,136,136,0.5)',
        label: "Preguntas por edades"
      }
    ]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    title: {
      display: true,
      text: 'Mesa de ayuda'
    },
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    hover: {
      mode: 'nearest',
      intersect: true
    },
    scales: {
      xAxes: [{
        display: true,
        categoryPercentage: 0.5,
        scaleLabel: {
          display: true,
          labelString: 'Sexo'
        }
      }],
      yAxes: [{
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Preguntas'
        }
      }]
    }
  },
  iceCream: [],
  drawer: false
}
},
mounted: function () {
  this.getListData();
},
methods: {
  getListData: async function () {

    this.status = "getting data...";
   // var that = this;
          
     await axios.get(base_url+'/admin/acceso/sexo').then((response) => {
      console.log(response.data+'hola:')
      
      this.getChartData(response.data);
    })
    .catch(function (error) {
      console.log(error);
    });
  },
  generarpdf(){
    var opt = {
      //margin: the default is [0, 0, 0, 0] top, left, bottom, right [0.2, 0.3, 0.1, 0.3]
      margin: [0.3, 0.3, 0.1, 0.1],
      filename: 'Estadisticas_mesa_de_ayuda.pdf',
      enableLinks: false,
      //pagebreak: { mode: 'avoid-all', before: '#page2el', avoid: 'img' },
      pagebreak: { before: '.salto_de_pagina', mode: 'avoid-all' },
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 1 },
      // jsPDF: { unit: 'in', format: 'a3', orientation: 'portrait' }
      jsPDF: { unit: 'in', format: 'a3', orientation: 'portrait' }
  };
  
  var $elementoParaConvertir;
  
  $elementoParaConvertir = document.body; // <-- Aquí­ puedes elegir cualquier elemento del DOM
          html2pdf().from($elementoParaConvertir).set(opt).toPdf().get('pdf').then(function(pdf) {
              // var totalPages = pdf.internal.getNumberOfPages();
              // console.log('totalPages: ' + totalPages);
              // for (var i = 1; i <= totalPages; i++) {
              //     console.log('Entró');
              //     pdf.setPage(i);
              //     pdf.setFontSize(10);
              //     pdf.setTextColor(150);
              //     pdf.text('Page ' + i + ' of ' + totalPages, pdf.internal.pageSize.getWidth() - 100,
              //         pdf.internal.pageSize.getHeight() - 30);
              // };
              //console.log(pdf);
            /*
              document.getElementById("titulo_principal").innerHTML = '';
              document.getElementById("info_fechas").innerHTML = ''
              document.getElementById("ciclo").innerHTML = '';
              document.getElementById("anio").innerHTML = '';
              document.getElementById("total_id").innerHTML = '';
            */
              console.log('Acabó de generar PDF');
  
          }).save().catch(err => console.log(err));
  },
  getChartData: function (chartData) {
    //console.log(chartData);
    var etiquetas=Object.keys(chartData[0]);
    var valores=Object.values(chartData[0]);
    
    
    for (var i = 0; i < etiquetas.length; i++) {
      
      this.ChartConfig.labels.push(etiquetas[i])
      
    }

    for (var i = 0; i < valores.length; i++) {
     this.ChartConfig.datasets[0].data.push(valores[i])
      
    }
    console.log(this.ChartConfig);
  }
}
});

