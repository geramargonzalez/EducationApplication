<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesGenerale $observacionesGenerale
 */
?>
<?php echo $this->element('menu_equipo_trabajo'); ?>    

                   <!-- end row -->
  <div class="row">
    <div class="col-12">
   <?= $this->Form->create($observacionesGeneral) ?>
    <div class="card m-b-20">
        <div class="card-block">
            <h4 class="mt-0 header-title">Acta del dia </h4>
            <p class="text-muted m-b-30 font-14">Escriba todo lo relevante al equipo de trabajo</p>
            <div class="form-group row">
                <div class="col-sm-12">
               <?php echo $this->Form->control('descripcion', ['label' => false, 'type' => 'textarea', 'class' => 'form-control', 'rows' => 15,'id' => 'observaciones']);?>
             </div>
             
            </div>
          
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Turnos</label>
                <div class="col-sm-10">
                     <?= $this->Form->control('turnos', ['label' => false, 'class' => 'form-control select2', 'options' => $turnos]); ?>
                </div>
                <label class="col-sm-2 col-form-label">Centros</label>
                <div class="col-sm-10">
                     <?= $this->Form->control('centros', ['label' => false, 'class' => 'form-control select2', 'options' => $centros]); ?>
                </div>
            </div>
          </div>
      </div>
      <?= $this->Form->button(__('submit'),['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Form->end() ?>
    </div> <!-- end col -->
    </div> <!-- end row -->
                   <!-- end row -->


 
  