<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesGenerale $observacionesGenerale
 */
?>
<?php echo $this->element('menu_equipo_trabajo'); ?>    
  <div class="row">
    <div class="col-12">
   <?= $this->Form->create($observacionesGeneral) ?>
    <div class="card m-b-20">
        <div class="card-block">
            <h4 class="mt-0 header-title">Observaciones </h4>
            <p class="text-muted m-b-30 font-14"></p>
            <div class="form-group row">
                <div class="col-sm-12">
               <?php echo $this->Form->control('descripcion', ['label' => false, 'type' => 'textarea', 'class' => 'form-control', 'rows' => 15]);?>
             </div>
            </div>
            <div class="form-group row">
                    <label for="example-number-input" class="col-sm-2 col-form-label">Deshabilitar</label>
                    <div class="col-sm-10">
                       <?php echo $this->Form->control('status',['class' => 'form-control','label' => false]); ?>
                    </div>
            </div>
          </div>
      </div>
      <?= $this->Form->button(__('submit'),['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Form->end() ?>
    </div> <!-- end col -->
</div> <!-- end row -->
                   <!-- end row -->


 
  