  <div class="page-content-wrapper ">
        <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-20">
                                <div class="card-block">
                                    <h1 class="mt-0 header-title"> <?= h('Resumen del dia de asistencias del' . " " . $grupo->name) ?></h1>
                                    <p class="text-muted m-b-30 font-14">En rojo los estudiantes que no vinieron y en verde los que vinieron</code>.
                                    </p>
                                     <?php if($grupoAsis  > 0) { ?>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th data-priority="1" ><?= $this->Paginator->sort('Nombre completo') ?></th>
                                            <th data-priority="1"><?= $this->Paginator->sort('faltas') ?></th>
                                            <th data-priority="1"><?= $this->Paginator->sort('Horas') ?></th>
                                             <th data-priority="1"><?= $this->Paginator->sort('Acciones') ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             <?php foreach ($alumnosFaltas as $alumnosFalta): 
                                               foreach ($alumnosFalta as $alumno): 
                                                ?>

                                                 <?php if($alumno->faltas == 1) { ?>
			                                        <tr>
			                                            <td class="bg-danger"><strong><?= h($alumno->name ." " .$alumno->surname) ?></strong></td>
			                                            <td class="bg-danger"><strong><?= $this->Number->format($alumno->faltas) ?></strong></td>
			                                            <td class="bg-danger"><strong><?= $this->Number->format($alumno->cant_horas) ?></strong></td>
                                                    <td class="actions">
                                                  
                                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $alumno->id],['class'=>'btn btn-danger btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                                </td>
			                                        </tr>
                                             	
                                             	<?php } else  if($alumno->faltas == 0) { ?>

		                                            <tr>
			                                            <td class="bg-primary" ><strong><?= h($alumno->name ." " .$alumno->surname) ?></strong></td>
			                                            <td class="bg-primary"><strong><?= $this->Number->format($alumno->faltas) ?></strong></td>
			                                            <td class="bg-primary"><strong><?= $this->Number->format($alumno->cant_horas) ?></strong></td>
                                                   <td class="actions">
                                                  
                                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $alumno->id],['class'=>'btn btn-primary btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>

                                                </td>
		                                        	</tr>
	                                       		 <?php  }?>

	                                            <?php endforeach; ?>
	                                            <?php endforeach; ?>
                                        </tbody>
                                           <tfoot>
					                       <tr>
						                        <td scope="col">Totales</td>
						                        <td><?= $this->Number->format(round($faltas)) ?></td>
						                        <td><?= $this->Number->format(round($horas)) ?></td>
					                    	</tr>
					                    </tfoot>
                                    </table>
                                
                                	<?php }else{ ?>

                                	 <p class="text-muted m-b-30 font-14">NO SE PASO LA LISTA TODAVIA</p>

                                	  <?php } ?>

                                </div>
                            
                            </div>
                        
                        </div> <!-- end col --> 

                    </div>
        </div>
</div>