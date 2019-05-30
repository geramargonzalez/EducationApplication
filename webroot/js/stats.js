 //google.load("visualization", "1", {packages:["corechart"]});
      google.charts.load('current', {'packages':['corechart']});
     

      // Define la función callback para crear la gráfica
      google.charts.setOnLoadCallback(drawChartRendimiento);
      google.charts.setOnLoadCallback(drawChartConducta); //drawChartExpresion
      google.charts.setOnLoadCallback(drawChartExpresionOral);
      google.charts.setOnLoadCallback(drawChartByDay);
      //google.charts.setOnLoadCallback(drawChartConducta);
      //google.charts.setOnLoadCallback(drawChartExpresion);
     //  google.charts.setOnLoadCallback(drawChartTipos);

      // Función para poblar la gráfica
      // iniciar el gráfico, pasa los datos y los dibuja
     function drawChartRendimiento() {

           var data = new google.visualization.DataTable();
           data.addColumn('string', 'Mes');
            data.addColumn('number', 'Promedio');
            data.addRows([
              <?php
                for ($i = 0; $i < count($rendimiento); $i++) {
                  
                   print "['" .$rendimiento[$i]["Mes"] ."'," . $rendimiento[$i]["rendimiento"]."]";
                  if($i+1 < count($rendimiento)) print ",";
                 }
                
              ?>
              ]);
          
          
         var options = {'title' : 'Promedio Mensual Rendimiento',
               colors: ['red'],
               lineWidth: 3,
               tooltip: {isHtml: true},
               hAxis: {
                  title: 'Mes',
                  minValue: 0,
                  maxValue: 12
 
               },
               vAxis: {
                  title: 'Promedio',
                  minValue: 0,
                  maxValue: 12
               }  
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica'));
        chart.draw(data, options);


      
      }

       function drawChartConducta() {

           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Promedio');
            data.addRows([
              <?php
                for ($i = 0; $i < count($conducta); $i++) {
                  
                   print "['" .$conducta[$i]["Mes"] ."'," .$conducta[$i]["conducta"]."]";
                  if($i+1 < count($conducta)) print ",";
                 }
                
                
              ?>
              ]);
          
          
         var options = {'title' : 'Promedio Mensual Conducta',
               colors: ['green'],
               lineWidth: 3,
               tooltip: {isHtml: true},
               hAxis: {
                  title: 'Mes',
                  minValue: 0,
                  maxValue: 12

               },
               vAxis: {
                  title: 'Promedio',
                  minValue: 0,
                  maxValue: 12
               }  
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica2'));
        chart.draw(data, options);


      }
   function drawChartExpresionOral() {

           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Promedio');
            data.addRows([
              <?php
               for ($i = 0; $i < count($expresion_oral); $i++) {
                  
                   print "['" .$expresion_oral[$i]["Mes"] ."'," .$expresion_oral[$i]["expresion_oral"]."]";
                  if($i+1 < count($expresion_oral)) print ",";
                 }
                
              ?>
              ]);
          
          
         var options = {'title' : 'Promedio Mensual Expresion Oral',
               colors: ['blue'],
               lineWidth: 3,
               tooltip: {isHtml: true},
               hAxis: {
                  title: 'Mes',
                  minValue: 0,
                  maxValue: 12

               },
               vAxis: {
                  title: 'Promedio',
                  minValue: 0,
                  maxValue: 12
               }  
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica3'));
        chart.draw(data, options);


      }


      function drawChartByDay() {

           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Rendimiento');
            data.addColumn('number', 'Conducta');
            data.addColumn('number', 'Expresion_oral');
            
            data.addRows([
              <?php
                for ($i = 0; $i < count($expresion_oral_diario); $i++) {
                 
                  print "['".$expresion_oral_diario[$i]["Dia"]. " / " .$expresion_oral_diario[$i]["Mes"] ."'," .$expresion_oral_diario[$i]["rendimiento"].",".$expresion_oral_diario[$i]["conducta"]."," .$expresion_oral_diario[$i]["expresion_oral"]."]";
                  if($i+1 < count($expresion_oral_diario)) print ",";
                 }
                 
                
              ?>
              ]);
          
          
         var options = {'title' : ' Registro diario ',
               colors: ['red','green','blue'],
               tooltip: {isHtml: true},
               hAxis: {
                  title: 'Dia y Mes',
                  minValue: 1,
                  maxValue: 12
               },
               vAxis: {
                  title: 'Evidencias',
                  minValue: 1,
                  maxValue: 12
               }
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica4'));
        chart.draw(data, options);

        
      }
