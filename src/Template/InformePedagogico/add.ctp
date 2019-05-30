<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformePedagogico $informePedagogico
 */
?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                  <?= $this->Form->create($informePedagogico) ?>
                <h4 class="mt-0 header-title">Crea un template para el informe</h4>
                <p class="text-muted m-b-30 font-14"></p>
                 <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('titulo',['class' => 'form-control','label' => false]); ?>
                    </div>
                 </div>

                     <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Cantidad de evidencias del informe</label>
                    <div class="col-sm-10">

                        <?php echo $this->Form->control('cantEvidencias',['class' => 'form-control','label' => false]); ?>
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
                
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> 
</div>   
