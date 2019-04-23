<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesercionAlumno $desercionAlumno
 */
?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                  <?= $this->Form->create($desercionAlumno) ?>
                <h4 class="mt-0 header-title">Habilidar estudiante</h4>
                <p class="text-muted m-b-30 font-14">lorep ipsum lorep ipsum lorep ipsum</p>               
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Escribe algun comentario sobre el reingreso</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('descripcion',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
          
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Elije el alumno</label>
                    <div class="col-sm-10">
                         <?= $this->Form->control('alumnos', ['label' => false, 'class' => 'form-control', 'options' => $alumnos]); ?>
                    </div>
                </div>
                 
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->