<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller $taller
 */
?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                  <?= $this->Form->create() ?>
                <h4 class="mt-0 header-title">Agregar alumno al grupo</h4>
                <p class="text-muted m-b-30 font-14"></p>
               
               <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Elije el grupo</label>
                    <div class="col-sm-10">
                         <?= $this->Form->control('grupos', ['label' => false, 'class' => 'form-control', 'options' => $grupos]); ?>
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