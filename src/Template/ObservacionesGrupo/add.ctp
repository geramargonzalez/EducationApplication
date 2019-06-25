<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno $observacionesAlumno
 */
?>
<?php echo $this->element('menu_grupo'); ?>    
  <div class="row">
    <div class="col-12">
   <?= $this->Form->create($observacionesGrupo) ?>
    <div class="card m-b-20">
        <div class="card-block">
            <h4 class="mt-0 header-title">Diagnostico grupal sobre los estudiantes de  <?= h($grupo->name) ?> </h4>
            <p class="text-muted m-b-30 font-14">Ingrese un diagnostico grupal. Puede agregar todos los que necesite.</p>
            <div class="form-group row">
                <div class="col-sm-12">
               <?php echo $this->Form->control('observaciones', ['label' => false, 'type' => 'textarea', 'class' => 'form-control','id' => 'observaciones' , 'rows' => 15]);?>
             </div>
            </div>
           
          </div>
      </div>
      <?= $this->Form->button(__('submit'),['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Form->end() ?>
    </div> <!-- end col -->
    </div> <!-- end row -->
                   <!-- end row -->


 
