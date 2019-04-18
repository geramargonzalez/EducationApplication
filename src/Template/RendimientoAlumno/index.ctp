<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RendimientoAlumno[]|\Cake\Collection\CollectionInterface $rendimientoAlumno
 */
?>

<div class="rendimientoAlumno index large-6 medium-6 columns content">
    <h3><?= __('Rendimiento Alumno: ' . $alumno->name ." " . $alumno->surname) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Tipo de evaluacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Rendimiento promedio ') ?></th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipo_evaluacion as $tipo): ?>
            <tr>
                <td><?= h($tipo['tipo_evaluacion']) ?></td>
                <td><?= $this->Number->format($tipo['rendimiento']) ?></td>
               
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>



<div class="stats large-6 medium-6 columns content">

  <div id="grafica2"></div>

</div>



<?php
 
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">
      //var google;


      google.charts.load('current', {'packages':['corechart']});

      // Define la función callback para crear la gráfica
     // google.charts.setOnLoadCallback(drawChart);
      //google.charts.setOnLoadCallback(drawChartConducta);
      //google.charts.setOnLoadCallback(drawChartExpresion);
       google.charts.setOnLoadCallback(drawChartTipos);

     
        function drawChartTipos() {
            // Define the chart to be drawn.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Tipo de tipo_evaluacion');
            data.addColumn('number', 'Porcentaje');
            data.addRows([
                <?php
               for ($i = 0; $i < count($grafico_torta); $i++) {
               print "['".$grafico_torta[$i]["tipo_evaluacion"]."', ".$grafico_torta[$i]["rendimiento"]."]";
                  if($i+1 < count($grafico_torta))print ",";
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
