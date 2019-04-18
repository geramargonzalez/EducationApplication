<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

?>
<?= $this->layout('empty'); ?>

 <div class="card">
    <div class="card-block">
        <?= $this->Form->create() ?>
        <h3 class="text-center mt-0 m-b-15">
             <?= $this->Html->image('../images/logo.png'); ?>
        </h3>

        <h4 class="text-muted text-center font-18"><b>login</b></h4>

        <div class="p-3">
            <form class="form-horizontal m-t-20" action="index.html">

                <div class="form-group row">
                    <div class="col-12">
                    
                          <?= $this->Form->control('email', ['label' => false, 'class' => 'form-control', 'placeholder' => __('Tu email')]) ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                          <?= $this->Form->control('password', ['label' => false, 'class' => 'form-control', 'placeholder' => __('Tu contraseña')]) ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Recuerdame</span>
                        </label>
                    </div>
                </div>

                <div class="form-group text-center row m-t-20">
                    <div class="col-12">
                           <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-block waves-effect waves-light']) ?>
                    </div>
                     <?= $this->Form->end() ?>
                </div>

                <div class="form-group m-t-10 mb-0 row">
                    <div class="col-sm-7 m-t-20">
                        <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock    "></i> Forgot your password?</a>
                    </div>
                    <div class="col-sm-5 m-t-20">
                        <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
