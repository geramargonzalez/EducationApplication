<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno[]|\Cake\Collection\CollectionInterface $observacionesAlumnos
 */
//$time = \Cake\I18n\Time::now();
?>

<?php echo $this->element('menu_proceso'); ?>    

<div class="row">
<div class="col-md-12">
     <h3 align="center"><?= __('Linea de tiempo') ?></h3>
    <section id="cd-timeline" class="cd-container">
        <?php foreach ($observacionesAlumnos as $observacionesAlumno): ?>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-danger">
                    <i class="mdi mdi-adjust"></i>
                </div> <!-- cd-timeline-img -->
                <div class="cd-timeline-content">
                     
                     <?php if($observacionesAlumno->etiqueta == "Negativa"){ ?>    
                           <div class="alert alert-danger" role="alert">
                                <strong><?= $observacionesAlumno->observaciones?></strong>
                            </div>
                     <?php } else if($observacionesAlumno->etiqueta == "Positiva") { ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?= $observacionesAlumno->observaciones?></strong>
                        </div>
                     <?php } else { ?>
                       <div class="alert alert-warning" role="alert">
                               <strong><?= $observacionesAlumno->observaciones?></strong>
                            </div>
                     <?php }  ?>
                      

                      <p><?= $this->Html->link(__('Ver detalle'),['action' => 'view', $observacionesAlumno->id, $alumno->id],['class'=>'btn btn-primary btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                     <?php if($user_session['id'] == $observacionesAlumno->id_user){ ?>    
                        <?= $this->Html->link(__('Editar'),['action' => 'edit', $observacionesAlumno->id, $alumno->id],['class'=>'btn btn-warning btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                        <?= $this->Html->link(__('Delete'),['action' => 'delete', $observacionesAlumno->id],['class'=>'btn btn-info btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                         <?php } ?>    
                    </p>
                    <span class="cd-date"><?= h($observacionesAlumno->created->day ."/ " .$observacionesAlumno->created->month )?></span>


                </div> <!-- cd-timeline-content -->
                </div> <!-- cd-timeline-block -->
         <?php endforeach; ?>
        
    </section> <!-- cd-timeline -->
</div>
</div><!-- Row -->
</div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->
