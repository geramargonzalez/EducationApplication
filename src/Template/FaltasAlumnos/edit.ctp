
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                <?= $this->Form->create($faltasAlumno) ?>
                <h4 class="mt-0 header-title">Editar la falta: </h4>
                <p class="text-muted m-b-30 font-14"></p>
                 <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Cantidad de horas</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('cant_horas',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->