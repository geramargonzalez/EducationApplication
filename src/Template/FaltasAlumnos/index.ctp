
<div class="row">
     <div class="col-md-4">
          
    </div>
   <div class="col-md-4 falta_grupos">
           <h1>Asistencia estudiantes</h1>
           <p>Eliga un grupo para pasar la asistencia</p>
    </div>
    <div class="col-md-4">
           
    </div>
</div>

<div class="row">
     <div class="col-md-4">
          
    </div>
   <div class="col-md-4">
           <?= $this->Form->create() ?>
            <div class="form-group">
                   <?= $this->Form->control('grupos', ['label' => false, 'class' => 'form-control', 'options' => $faltas]); ?>
            </div> 
            <div class="form-group">
                    <?= $this->Form->button(__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']); ?>
            </div>
            <?= $this->Form->end() ?>
    </div>
    <div class="col-md-4">
           
    </div>
</div>
     
   