   /*<?php 

  */
  

  google.charts.load('current', {'packages':['corechart']});

      // Define la función callback para crear la gráfica
      google.charts.setOnLoadCallback(drawChart);

      // Función para poblar la gráfica
      // iniciar el gráfico, pasa los datos y los dibuja
      function drawChart() {

        // Crea la gráfica
        /*
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Navegador');
        data.addColumn('number', 'Porcien');
        data.addRows([
          ['Chrome', 61],
          ['Firefox', 16],
          ['Internet Explorer', 13],
          ['Safari', 5],
          ['Otros', 5]
        ]);

        //arrayToDataTable()
        var data = google.visualization.arrayToDataTable([
          ['Navegador','Porcien'],
          ['Chrome', 61],
          ['Firefox', 16],
          ['Internet Explorer', 13],
          ['Safari', 5],
          ['Otros', 5]
        ]);
        */


        var data = new google.visualization.DataTable({
        cols: [{id: 'navegador', label: 'Navegador', type: 'string'},
               {id: 'porcien', label: 'Porciento', type: 'number'}],
        rows: [{c:[{v: 'Chrome'}, {v: 61, f:'Sesenta y un porciento'}]},
               {c:[{v: 'Firefox'}, {v: 16, f:'Diez y seis porciento'}]},
               {c:[{v: 'Internet Explorer'}, {v: 13, f:'Trece porciento'}]},
               {c:[{v: 'Safari'}, {v:5, f:'Cinco porciento'}]},
               {c:[{v: 'Otros'}, {v:5, f:'Cinco porciento'}]}]
        });
        
        
        // Opciones de la gráfica
        var opciones = {'title':'Participación de los Navegadores',
                      'is3D':true,
                       'width':500,
                       'height':400};

        // Inicia la gráfica
        var chart = new google.visualization.PieChart(document.getElementById('grafica'));
        chart.draw(data, opciones);
      }