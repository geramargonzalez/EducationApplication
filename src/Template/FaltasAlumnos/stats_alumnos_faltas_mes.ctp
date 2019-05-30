<div class="row">
  <div class="col-md-12 text-center">
   <h1 > <?= __("Cantidad de faltas por mes del estudiante del" . " " . $alumno->name . " " . $alumno->surname) ?></h1>
    
  </div>
  <div class="col-md-6">
    <div id="grafica"class="chart">      </div>
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
      //var google;

      //google.load("visualization", "1", {packages:["corechart"]});
      google.charts.load('current', {'packages':['corechart']});

      // Define la función callback para crear la gráfica
      google.charts.setOnLoadCallback(drawChartFaltas);
      google.charts.setOnLoadCallback(drawChartCantHoras); //drawChartExpresion
      
 
     function drawChartFaltas() {

           var data = new google.visualization.DataTable();
           data.addColumn('string', 'Mes');
            data.addColumn('number', 'Cantidad');
            data.addRows([
              <?php
                for ($i = 0; $i < count($faltas); $i++) {
                  
                   print "['" .$faltas[$i]["Mes"] ."'," .$faltas[$i]["faltasMes"]."]";
                  if($i+1 < count($faltas)) print ",";
                 }
                
              ?>
              ]);
          
          
         var options = {'title' : 'Cantidad faltas por mes',
               colors: ['red'],
               lineWidth: 3,
               hAxis: {
                  title: 'Mes',
                  minValue: 0,
                  maxValue: 100
 
               },
               vAxis: {
                  title: 'Cantidad',
                  minValue: 0,
                  maxValue: 100
               },   
               'width':600,
               'height':600   
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica'));
        chart.draw(data, options);
      }

       function drawChartCantHoras() {

           var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mes');
            data.addColumn('number', 'Cantidad horas');
            data.addRows([
              <?php
                for ($i = 0; $i < count($horas); $i++) {
                  
                   print "['" .$horas[$i]["Mes"] ."'," .$horas[$i]["horasMes"]."]";
                  if($i+1 < count($horas)) print ",";
                 }
                
                
              ?>
              ]);
          
          
         var options = {'title' : 'Cantidad horas por mes',
               colors: ['green'],
               lineWidth: 3,
               hAxis: {
                  title: 'Mes',
                  minValue: 0,
                  maxValue: 100

               },
               vAxis: {
                  title: 'Promedio',
                  minValue: 0,
                  maxValue: 100
               },   
               'width':600,
               'height':600   
            };
        // Inicia la gráfica
        var chart = new google.visualization.LineChart(document.getElementById('grafica2'));
        chart.draw(data, options);
      }


    
 </script>







