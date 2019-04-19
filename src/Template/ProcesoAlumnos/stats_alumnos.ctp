<?php
 
?>

<?php echo $this->element('menu_proceso'); ?>    

<h3><?= __("Rendimiento general: " . $alumno->name . " " . $alumno->surname) ?></h3>
  <div class="row">
    <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-block">

                <h4 class="mt-0 header-title">Histograma de promedios generales</h4>
                <p class="text-muted m-b-30 font-14">Se muestran los diagramas generales de todos los docentes que tienen al estudiante <?= __( $alumno->name . " " . $alumno->surname) ?>.</p>


                <div id="grafica" height="300"></div>

            </div>
        </div>
    </div> 
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
      //var google;


      google.charts.load('current', {'packages':['corechart']});

      // Define la función callback para crear la gráfica
      google.charts.setOnLoadCallback(drawChart);
      //google.charts.setOnLoadCallback(drawChartConducta);
      //google.charts.setOnLoadCallback(drawChartExpresion);
     //  google.charts.setOnLoadCallback(drawChartTipos);

      // Función para poblar la gráfica
      // iniciar el gráfico, pasa los datos y los dibuja
      function drawChart() {

           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Rendimiento');
            data.addColumn('number', 'Conducta');
            data.addColumn('number','Expresion oral');
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
                  minValue: 0,
                  maxValue: 12
               },
               vAxis: {
                  title: 'Promedio',
                  minValue: 0,
                  maxValue: 12
               },   
               'width':550,
               'height':400   
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica'));
        chart.draw(data, options);
      }


     
    
 </script>






