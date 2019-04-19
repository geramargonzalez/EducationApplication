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
     <h3><?= __('Linea de tiempo de ' . $alumno->name . " " . $alumno->surname ) ?></h3>
    <section id="cd-timeline" class="cd-container">
        <?php foreach ($observacionesAlumnos as $observacionesAlumno): ?>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-danger">
                    <i class="mdi mdi-adjust"></i>
                </div> <!-- cd-timeline-img -->
                <div class="cd-timeline-content">
                     <h3><?= $observacionesAlumno->etiqueta ?></h3>
                     <?= $observacionesAlumno->observaciones?>
                     <p><?= $this->Html->link(__('Ver detalle'),['action' => 'view', $observacionesAlumno->id, $alumno->id],['class'=>'btn btn-primary btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?></p>
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
