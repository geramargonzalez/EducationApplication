<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesGenerale $observacionesGenerale
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno $observacionesAlumno
 */
?>
<?php echo $this->element('menu_equipo_trabajo'); ?>    
<div class="row">
    <div class="col-12">
        <h4 class="m-t-20 m-b-20">Detalle de la observacion</h4>
        <div class="card-columns">
            <div class="card m-b-20">
                <div class="card-block">
                    <?= $this->Text->autoParagraph($observacionesGeneral->descripcion); ?>
                    <p class="text-muted">Por <?= h($observacionesGeneral->user->name . " " . $observacionesGeneral->user->surname ) ?>,creada <?= h($observacionesGeneral->created->day . " / " .$observacionesGeneral->created->month) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
         
 