
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                 <?= $this->Form->create() ?>
                <h4 class="mt-0 header-title">Cambio de contraseña</h4>
                <p class="text-muted m-b-30 font-14">lorep ipsum lorep ipsum lorep ipsum</p>
               
                <div class="form-group row">
                    <label for="example-password-input" class="col-sm-2 col-form-label">Contraseña vieja</label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->control('0_password',['class' => 'form-control','label' => false,'type' => 'password']); ?>
                        </div>
                    </div>

                 <div class="form-group row">
                    <label for="example-password-input" class="col-sm-2 col-form-label">Contraseña nueva</label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->control('password',['class' => 'form-control','label' => false,'type' => 'password','name' =>'pass','data-validation'=>'length','data-validation-length'=>'min8', 'id' => 'pass']); ?>
                        </div>
                    </div>
                
                <div class="form-group row">
                    <label for="example-password-input" class="col-sm-2 col-form-label">Rescribe la contraseña</label>
                        <div class="col-sm-10">
                            <?php echo $this->Form->control('r_password',['class' => 'form-control','label' => false,'type' => 'password','name' =>'pass_confirmation','data-validation'=>'confirmation','id'=>'pass_confirmation']); ?>
                        </div>
                </div>
                <div id="errors">
                </div>

                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


