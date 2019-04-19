<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno $observacionesAlumno
 */
?>
<?php echo $this->element('menu_proceso'); ?>    
  <div class="row">
    <div class="col-12">
   <?= $this->Form->create($observacionesAlumno) ?>
    <div class="card m-b-20">
        <div class="card-block">
            <h4 class="mt-0 header-title">Observaciones </h4>
            <p class="text-muted m-b-30 font-14">Escriba todo lo relevante al estudiante  <?= h($alumno->name ." " .$alumno->surname) ?></p>
            <div class="form-group row">
                <div class="col-sm-12">
               <?php echo $this->Form->control('observaciones', ['label' => false, 'type' => 'textarea', 'class' => 'form-control','id' => 'observaciones' , 'rows' => 15]);?>
             </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Etiqueta de reunion</label>
                <div class="col-sm-10">
                     <?= $this->Form->control('tags', ['label' => false, 'class' => 'form-control select2', 'options' => $tags]); ?>
                </div>
            </div>
          </div>
      </div>
      <?= $this->Form->button(__('submit'),['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Form->end() ?>
    </div> <!-- end col -->
    </div> <!-- end row -->
                   <!-- end row -->


 
