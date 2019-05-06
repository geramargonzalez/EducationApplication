<div class="row">
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                  <?= $this->Form->create() ?>
                <h4 class="mt-0 header-title">Agrega tu centro</h4>
                <p class="text-muted m-b-30 font-14">Solo en caso de los C.E.C</p>
               
               <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Elije el turno</label>
                    <div class="col-sm-10">
                         <?= $this->Form->control('id_turno', ['label' => false, 'class' => 'form-control', 'options' => $turnos]); ?>
                    </div>
                </div>
          
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Elije el centro</label>
                    <div class="col-sm-10">
                         <?= $this->Form->control('id_centro', ['label' => false, 'class' => 'form-control', 'options' => $centros]); ?>
                    </div>
                </div>
                 
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->