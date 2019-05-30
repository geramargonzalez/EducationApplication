<?php
 
?>

<?php echo $this->element('menu_proceso'); ?> 


<?php  //$this->getRequestTarget(); ?>   


  <div class="row">
  <div class="col-md-12 text-center">
   <h1 ><?= __("Rendimiento general: " . $alumno->name . " " . $alumno->surname) ?></h1>
    <p class="text-muted m-b-30 font-14">Se muestran los histogramas generales de todos los docentes que tienen al estudiante <?= __( $alumno->name . " " . $alumno->surname) ?>.</p>

  </div>
  <div class="col-md-6">
    <div id="grafica"class="chart"></div>
  </div>
  <div class="col-md-6">
    <div id="grafica2"  class="chart"></div>
  </div>
</div>

<div class="row">

  <div class="col-md-6">
    <div id="grafica3"class="chart"></div>
  </div>
  <div class="col-md-6">
    <div id="grafica4"  class="chart"></div>
  </div>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
      
      google.charts.load('current', {'packages':['corechart']});
      // Define la función callback para crear la gráfica
      google.charts.setOnLoadCallback(drawChartRendimiento);
      google.charts.setOnLoadCallback(drawChartConducta);
      google.charts.setOnLoadCallback(drawChartExpresionOral);
      //google.charts.setOnLoadCallback(drawChartConducta);
      //google.charts.setOnLoadCallback(drawChartExpresion);
      google.charts.setOnLoadCallback(drawChartTipos);

      // Función para poblar la gráfica
      // iniciar el gráfico, pasa los datos y los dibuja
      function drawChartRendimiento() {

           var data = new google.visualization.DataTable();
           data.addColumn('string', 'Mes');
            data.addColumn('number', 'Promedio');
            data.addRows([
              <?php
                for ($i = 0; $i < count($rendimiento); $i++) {
                  
                   print "['" .$rendimiento[$i]["Mes"] ."'," .$rendimiento[$i]["rendimiento"]."]";
                  if($i+1 < count($rendimiento)) print ",";
                 }
                
              ?>
              ]);
          
          
         var options = {'title' : 'Promedio Mensual Rendimiento',
               colors: ['red'],
               lineWidth: 3,
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
               'title':'Los tipos de evaluacion'
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(document.getElementById('grafica4'));
            chart.draw(data, options);
         }

 </script>




