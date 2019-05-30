
<div class="row">
     <div class="col-md-4">    
    </div>
   <div class="col-md-4 falta_grupos">
           <h1>Centro</h1>
           <p>Escoja correctamente el centro para ver las estadisticas</p>
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
                   <?= $this->Form->control('centros', ['label' => false, 'class' => 'form-control', 'options' => $centros]); ?>
            </div> 
            <div class="form-group">
                    <?= $this->Form->button(__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']); ?>
            </div>
            <?= $this->Form->end() ?>
    </div>
    <div class="col-md-4">
           
    </div>
</div>
     
   