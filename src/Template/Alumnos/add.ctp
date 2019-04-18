<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alumno $alumno
 */
?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                 <?= $this->Form->create($alumno,['type' => 'file']) ?>
                <h4 class="mt-0 header-title">Agregar Estudiante</h4>
                <p class="text-muted m-b-30 font-14">lorep ipsum lorep ipsum lorep ipsum</p>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Imagen</label>
                    <div class="col-sm-10">
                      <?= $this->Html->image('../images/users/avatar-1.jpg', ['id' => 'show-file', 'class' => 'img-responsive img-circle', 'style' => 'margin: 0px auto; width: 200px; padding: 3px;']); ?>
                        <?= $this->Form->file('image'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('name',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Apellido</label>
                    <div class="col-sm-10">
                        <?php  echo $this->Form->control('surname',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">Telefono</label>
                    <div class="col-sm-10">
                         <?php echo $this->Form->control('tel',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-number-input" class="col-sm-2 col-form-label">C.I</label>
                    <div class="col-sm-10">
                        
                       <?php echo $this->Form->control('ci',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="example-number-input" class="col-sm-2 col-form-label">Edad</label>
                    <div class="col-sm-10">
                       <?php echo $this->Form->control('age',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Procedencia</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('procedencia',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Turno</label>
                    <div class="col-sm-10">
                        
                         <?= $this->Form->control('turnos', ['label' => false, 'class' => 'form-control', 'options' => $turnos]); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Centro</label>
                    <div class="col-sm-10">
                        
                        
                         <?= $this->Form->control('centros', ['label' => false, 'class' => 'form-control', 'options' => $centros]); ?>
                    </div>
                </div>
                 <div class="m-t-20">
                    <h6 class="text-muted"><b>Observaciones</b></h6>
                   <?php echo $this->Form->control('observation',['class' =>"form-control",'maxlength'=>"255",'label' => false]); ?>
                </div>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->