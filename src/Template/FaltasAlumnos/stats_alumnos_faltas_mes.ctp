 <div class="row">
    <div class="col-lg-6">
        <div class="card m-b-20">
            <div class="card-block">

                <h4 class="mt-0 header-title">Cantidad de faltas por mes del estudiante del  <?= __( $alumno->name . " " . $alumno->surname) ?> </h4>
              


                <div id="grafica" height="500"></div>

            </div>
        </div>
    </div> 
     <div class="col-lg-6">
        <div class="card m-b-20">
            <div class="card-block">

                <h4 class="mt-0 header-title">Cantidad de horas por mes del estudiante del  <?= __( $alumno->name . " " . $alumno->surname) ?> </h4>

                <div id="grafica2" height="500"></div>

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
      google.charts.setOnLoadCallback(drawChartFaltas);
      google.charts.setOnLoadCallback(drawChartCantHoras); //drawChartExpresion
      
      //google.charts.setOnLoadCallback(drawChartConducta);
      //google.charts.setOnLoadCallback(drawChartExpresion);
     //  google.charts.setOnLoadCallback(drawChartTipos);

      // Función para poblar la gráfica
      // iniciar el gráfico, pasa los datos y los dibuja
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







