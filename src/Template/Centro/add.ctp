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
                <h4 class="mt-0 header-title">Agregar Centro de estudio</h4>
                <p class="text-muted m-b-30 font-14">Cualquier centro que se encuentre en Anep</p>               
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
          
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Elije un subsistema</label>
                    <div class="col-sm-10">
                         <?= $this->Form->control('id_subsistema', ['label' => false, 'class' => 'form-control', 'options' => $subsistemas]); ?>
                    </div>
                </div>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->