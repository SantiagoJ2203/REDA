$("#btnColumnas").click(function(){
    columnas();
});
$("#btnLineas").click(function(){
    lineas();
});

$("#btnTorta").click(function(){
   torta();
});

$("#btnPrueba").click(function(){
    prueba();
});


function columnas(){
    Highcharts.chart('contenedor',{
       chart:{
        type:'column'
        },
        title:{
            text:'Reportes de asistencia e inasistencia semanal'
        },
        xAxis:{
            type:'category'
        },
        yAxis:{
            title:{
                text: 'Cantidad de asistencias e inasistencia'
            },
        },
        series:[{
            data:[{
                name:'Asistencias',
                color: 'rgb(35, 130, 118)',
                y:5, //cant de modelos
                
            },{
                name:'Inasistencias',
                 color: 'rgb(225, 115, 35);',
                y:4,
                
            }]
        }],
             
    });
}

function lineas(){
Highcharts.chart('contenedor',{
    chart:{
        type: 'line'
    },
})
}

function torta(){
    Highcharts.chart('contenedor', {
     chart:{
         type:'pie',
         plotBackgroundColor: '#f8f9fa', //color de fondo del gráfico
         plotBorderwidth: 1,
         plotShadow:false,
     },
     title:{
       text: 'Asistencias e inasistencias semanalmente.'  
     },
     tooltip:{
         pointFormat:'{series.name}:<b>{point.percentage:.2f}</b>%',
     },
     plotOptions:{
         pie:{
             allowPointSelect:true,
             cursor:'pointer',
             dataLabels:{
                 enabled: true,
                 format: '{point.name}:<b>{point.percentage:.2f}</b>%'                    
             }
         }
     },            
     series: [{
         name: 'Marcas',
         colorByPoint: true,
         data:[{
             name:'Asistencias',
             y:61.41,
             
             selected: true
         },{
             name:'IE',
             y:11.84
         },{
             name:'Edge',
             y:4.67
         },{
             name:'Safari',
             y:4.18
         },{
             name:'Sogou Explorer',
             y:1.64
         },{
             name:'Opera',
             y:1.6
         },{
             name:'Otros',
             y:3.81
         }]
     }]               
 });
}