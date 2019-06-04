<div class="row">
   
   <div class="col-md-12 falta_grupos" align="center">
           <h1>Informes</h1>
           <p>Escoja correctamente el informe que se ajusta a su evaluación</p>
    </div>
   
</div>
<div class="row" >
     <div class="col-md-4">
          
    </div>
   <div class="col-md-4">
           <?= $this->Form->create() ?>
            <div class="form-group">
                   <?= $this->Form->control('informes', ['label' => false, 'class' => 'form-control', 'options' => $informes]); ?>
            </div> 
            <div class="form-group">
                    <?= $this->Form->button(__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']); ?>
            </div>
            <?= $this->Form->end() ?>
    </div>
    <div class="col-md-4">
           
    </div>
</div>
     
   