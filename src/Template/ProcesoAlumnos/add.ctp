<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcesoAlumno $procesoAlumno
 */
?>

<?php echo $this->element('menu_proceso'); ?>    

<div class="row"> 
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                 <?= $this->Form->create($procesoAlumno) ?>
                <h4 class="mt-0 header-title"><?= __('Proceso diario: ' . $alumno->name . " " . $alumno->surname) ?></h4>
                <p class="text-muted m-b-30 font-14">lorep ipsum lorep ipsum lorep ipsum</p>
               
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Conducta</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('conducta',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                
                 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipo de evaluacion</label>
                    <div class="col-sm-10">
                        
                         <?= $this->Form->control('tipoevaluacion', ['label' => false, 'class' => 'form-control', 'options' => $tipoEvaluacion]); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Rendimiento</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('rendimiento',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Expresion Oral</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('expresion_oral',['class' => 'form-control','label' => false]); ?>
                    </div>
                  </div>
               
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-12">
    </div>
</div> <!-- end row -->