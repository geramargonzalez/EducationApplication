<?php
 
?>

<?php echo $this->element('menu_proceso'); ?>    

<h3><?= __("Observaciones: " . $alumno->name . " " . $alumno->surname) ?></h3>
 <div class="row">
    <div class="col-lg-6">
        <div class="card m-b-6">
            <div class="card-block">

                <h4 class="mt-0 header-title">Columnas de observaciones</h4>
                <p class="text-muted m-b-30 font-14">Se muestras la cantidad de observaciones que tuvo el estudiante <?= __( $alumno->name . " " . $alumno->surname) ?>.</p>
                    
                <div id="grafica"></div>
              
            </div>
        </div>
    </div> 
     <div class="col-lg-6">
        <div class="card m-b-12">
            <div class="card-block">

                <h4 class="mt-0 header-title">Diagrama de tortas de observaciones</h4>
                <p class="text-muted m-b-30 font-14">Se muestras la cantidad de observaciones que tuvo el estudiante <?= __( $alumno->name . " " . $alumno->surname) ?>.</p>
                    
                <div id="grafica2"></div>
              
            </div>
        </div>
    </div> 

  </div>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
      //var google;

      //google.load("visualization", "1", {packages:["corechart"]});
      google.charts.load('current', {'packages':['corechart']});

      // Define la función callback para crear la gráfica
      google.charts.setOnLoadCallback(drawChartTipos);

      google.charts.setOnLoadCallback(drawChartColumn);

      //google.charts.setOnLoadCallback(drawChartConducta);
      //google.charts.setOnLoadCallback(drawChartExpresion);
     //  google.charts.setOnLoadCallback(drawChartTipos);

      // Función para poblar la gráfica
      // iniciar el gráfico, pasa los datos y los dibuja
       function drawChartColumn() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Etiqueta');
            data.addColumn('number', 'Cantidad');
            data.addRows([
                <?php
               for ($i = 0; $i < count($observaciones); $i++) {
               print "['".$observaciones[$i]["etiqueta"]."', ".$observaciones[$i]["cantidad"]."]";
                  if($i+1 < count($observaciones))print ",";
                 }
                ?>
              
            ]);
               
            // Set chart options
            var options = {
               'title':'Diagrama de torta Observaciones',
                vAxis: {
                  title: 'Cantidad',
                  minValue: 0,
                  maxValue: 100
               },
               'width':600,
               'height':600
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('grafica'));
            chart.draw(data, options);
         }

           function drawChartTipos() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Etiqueta');
            data.addColumn('number', 'Cantidad');
            data.addRows([
                <?php
               for ($i = 0; $i < count($observaciones); $i++) {
               print "['".$observaciones[$i]["etiqueta"]."', ".$observaciones[$i]["cantidad"]."]";
                  if($i+1 < count($observaciones))print ",";
                 }
                ?>
              
            ]);
               
            // Set chart options
            var options = {
               'title':'Diagrama de torta Observaciones',
                vAxis: {
                  title: 'Cantidad',
                  minValue: 0,
                  maxValue: 100
               },
               'width':600,
               'height':600
            };

            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(document.getElementById('grafica2'));
            chart.draw(data, options);
         }

    
     
    
 </script>







