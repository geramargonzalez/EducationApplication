<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evidencia $evidencia
 */
?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                  <?= $this->Form->create($evidencia) ?>
                <h4 class="mt-0 header-title">Crear evidencia</h4>
                <p class="text-muted m-b-30 font-14"><?=  __('Necesitas ' . $cantEvidencias . 'tipo de evidencias')?></p>
                 <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Tipo (ejemplo:Materia)</label>
                    <div class="col-sm-6">
                       <?php echo $this->Form->control('descripcion',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Agrege las evidencias necesarias</label>
                    <button class='add_button' ><i class="fa fa-plus-circle"></i></button>
                </div>
                <div class="form-group row field_wrapper">
                     <div class="col-sm-10">
                        <input type="text" name="field_name[]" value="" class="form-control"/>
                        <a href="javascript:void(0);" class="remove_button"><i class="dripicons-cross"></i></a>
                    </div>'
                </div>

                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row --> 