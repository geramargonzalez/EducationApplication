<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centro $centro
 */
?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                <?= $this->Form->create($centro) ?>
                <h4 class="mt-0 header-title">Editar Centro de estudio</h4>  
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('name',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Dirección</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('direccion',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Telefono</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('tel',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->