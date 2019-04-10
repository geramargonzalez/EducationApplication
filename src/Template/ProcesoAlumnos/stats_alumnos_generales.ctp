<?php
 
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
      //var google;


      google.charts.load('current', {'packages':['corechart']});

      // Define la función callback para crear la gráfica
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChartConducta);
      google.charts.setOnLoadCallback(drawChartExpresion);
       google.charts.setOnLoadCallback(drawChartTipos);

      // Función para poblar la gráfica
      // iniciar el gráfico, pasa los datos y los dibuja
      function drawChart() {

           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Rendimiento');
            data.addRows([
              <?php
                for ($i = 0; $i < count($rendimiento); $i++) {
                 print "['".$rendimiento[$i]["Mes"]."', ".$rendimiento[$i]["rendimiento"]."]";
                 if($i+1 < count($rendimiento))print ",";
                 }
              ?>
              ]);

         var options = {'title' : 'Promedio mensual rendimiento',
               hAxis: {
                  title: 'Mes'
               },
               vAxis: {
                  title: 'Promedio'
               },   
               'width':550,
               'height':400   
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica'));
        chart.draw(data, options);
      }
        
        function drawChartConducta() {

           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Conducta');
            data.addRows([
              <?php
               for ($i = 0; $i < count($rendimiento); $i++) {
                echo "['".$rendimiento[$i]["Mes"]."', ".$rendimiento[$i]["conducta"]."]";
                  if($i+1 < count($rendimiento))print ",";
                 }
                ?>
               
              ]);

         var options = {'title' : 'Promedio mensual conducta',
               hAxis: {
                  title: 'Mes'
               },
               vAxis: {
                  title: 'Promedio'
               },   
               'width':550,
               'height':400   
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica2'));
        chart.draw(data, options);
      }


        function drawChartExpresion() {

           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Expresion Oral');
            data.addRows([
              <?php
                 for ($i = 0; $i < count($rendimiento); $i++) {
                  print "['".$rendimiento[$i]["Mes"]."', ".$rendimiento[$i]["expresion_oral"]."]";
                  if($i+1 < count($rendimiento)) print ",";
                 }
                ?>
               
              ]);
        
         var options = {'title' : 'Promedio mensual expresion oral',
               hAxis: {
                  title: 'Mes'
               },
               vAxis: {
                  title: 'Promedio'
               },   
               'width':500,
               'height':400   
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica3'));
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
            var chart = new google.visualization.PieChart(document.getElementById('grafica4'));
            chart.draw(data, options);
         }
    
 </script>


  <h3><?= __("Rendimiento global: " . $alumno->name . " " . $alumno->surname) ?></h3>


<div class="stats large-6 medium-6 columns content">

  <div id="grafica"></div>

</div>
<div class="stats large-6 medium-6 columns content">

  <div id="grafica2"></div>

</div>

<div class="stats large-6 medium-6 columns content">

  <div id="grafica3"></div>

  
</div>

<div class="stats large-6 medium-6 columns content">

  <div id="grafica3"></div>

  
</div>

<div class="stats large-6 medium-6 columns content">

  <div id="grafica4"></div>

  
</div>

