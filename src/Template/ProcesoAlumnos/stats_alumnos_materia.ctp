<?php
 
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
      //var google;


      google.charts.load('current', {'packages':['corechart']});

      // Define la función callback para crear la gráfica
      google.charts.setOnLoadCallback(drawChart);
      //google.charts.setOnLoadCallback(drawChartConducta);
      //google.charts.setOnLoadCallback(drawChartExpresion);
       google.charts.setOnLoadCallback(drawChartTipos);

      // Función para poblar la gráfica
      // iniciar el gráfico, pasa los datos y los dibuja
      function drawChart() {

           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Rendimiento');
            data.addColumn('number', 'Conducta');
            data.addColumn('number', 'Expresion oral');
            data.addRows([
              <?php
                for ($i = 0; $i < count($rendimiento); $i++) {
                  print "['".$rendimiento[$i]["Mes"]."'," .$rendimiento[$i]["rendimiento"].",".$rendimiento[$i]["conducta"]."," .$rendimiento[$i]["expresion_oral"]."]";
                  if($i+1 < count($rendimiento)) print ",";
                 }
                
              ?>
              ]);
         var options = {'title' : 'Promedio mensual ',
               hAxis: {
                  title: 'Mes',
                  minValue: 0
               },
               vAxis: {
                  title: 'Promedio',
                  minValue: 0
               },   
               'width':550,
               'height':400   
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica'));
        chart.draw(data, options);
      }

      function drawChartTipos() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tipo de tipo_evaluacion');
            data.addColumn('number', 'Porcentaje');
            data.addRows([
                <?php
               for ($i = 0; $i < count($tipo_evaluacion); $i++) {
               print "['".$tipo_evaluacion[$i]["tipo_evaluacion"]."', ".$tipo_evaluacion[$i]["rendimiento"]."]";
                  if($i+1 < count($tipo_evaluacion))print ",";
                 }
                ?>
              
            ]);  
            // Set chart options
            var options = {
               'title':'Los tipos de evaluacion',
               'width':500,
               'height':400
            };
            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(document.getElementById('grafica2'));
            chart.draw(data, options);
         }
    
 </script>


  <h3><?= __("Rendimiento general: " . $taller->name) ?></h3>


<div class="stats large-6 medium-6 columns content">

  <div id="grafica"></div>

</div>

<div class="stats large-6 medium-6 columns content">

  <div id="grafica2"></div>

  
</div>

