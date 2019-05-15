  <div class="page-content-wrapper ">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card m-b-20">
                      <div class="card-block">
                          <h1 class="mt-0 header-title"> <?= h('Resumen de asistencias del alumno ' . " " . $alumno->name . " " . $alumno->surname) ?></h1>
                        
                          <p><?= h($alumno->name ." " .$alumno->surname) ?></p>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th data-priority="1"><?= $this->Paginator->sort('Dia') ?></th>
                                   <th data-priority="1"><?= $this->Paginator->sort('Fecha') ?></th>

                                  <th data-priority="1"><?= $this->Paginator->sort('faltas') ?></th>
                                  <th data-priority="1"><?= $this->Paginator->sort('Horas') ?></th>
                                  
                                   <th data-priority="1"><?= $this->Paginator->sort('Acciones') ?></th>
                              </tr>
                              </thead>
                              <tbody>
                                   <?php foreach ($faltas as $falta): ?>

                                       <?php if($falta->faltas == 1) { ?>
                                    <tr>
                                        <td class="bg-danger"></td>
                                         <td class="bg-danger"><?= h($falta->created->day .' / '.$falta->created->month) ?></td>
                                        <td class="bg-danger"><strong><?= $this->Number->format($falta->faltas) ?></strong></td>
                                        <td class="bg-danger"><strong><?= $this->Number->format($falta->cant_horas) ?></strong></td>
                                             
                                          <td class="actions">
                                        
                                          <?= $this->Html->link(__('Editar'), ['action' => 'edit', $falta->id_alumno],['class'=>'btn btn-danger btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                      </td>
                                    </tr>
                                   	
                                   	<?php } else  if($falta->faltas == 0) { ?>

                                      <tr>
                                        <td class="bg-primary"></td>
                                        <td class="bg-primary"><?= h($falta->created->day .' / '.$falta->created->month) ?></td>
                                        <td class="bg-primary"><strong><?= $this->Number->format($falta->faltas) ?></strong></td>
                                        <td class="bg-primary"><strong><?= $this->Number->format($falta->cant_horas) ?></strong></td>
                                              
                                         <td class="actions">
                                        
                                          <?= $this->Html->link(__('Editar'), ['action' => 'edit', $falta->id_alumno],['class'=>'btn btn-primary btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>

                                      </td>
                                  	</tr>
                               		 <?php  }?>
                                    <?php endforeach; ?>
                              </tbody>
                                 <tfoot>
  					                       <tr>
  						                        <td scope="col">Totales</td>
                                      <td scope="col"></td>
  						                        <td><?= $this->Number->format(round($totalFaltas)) ?></td>
  						                        <td><?= $this->Number->format(round($totalHoras)) ?></td>
  					                    	</tr>
  					                    </tfoot>
                          </table>
                      </div>
                  </div>
              </div> <!-- end col --> 
          </div>    
        </div>
</div>