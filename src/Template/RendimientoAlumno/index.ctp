<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RendimientoAlumno[]|\Cake\Collection\CollectionInterface $rendimientoAlumno
 */
?>

<?php echo $this->element('menu_proceso'); ?>    

<div class="row">
      <div class="col-12">
          <div class="card m-b-20">
              <div class="card-block">
                  <h4 class="mt-0 header-title"><?= __('Rendimiento: ' . $alumno->name ." " . $alumno->surname) ?></h4>
                  <p class="text-muted m-b-30 font-14">Desgloce de cada una de las evaluaciones del estudiante hechas por el docente.
                  </p>
                  <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th><?= $this->Paginator->sort('Evaluacion') ?></th>
                          <td><?= $this->Paginator->sort('Promedio ') ?></td>
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
          </div>
      </div> <!-- end col -->
  </div> <!-- end row -->


<div class="stats large-6 medium-6 columns content">

  <div id="grafica2"></div>

</div>



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
