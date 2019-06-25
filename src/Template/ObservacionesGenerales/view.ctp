<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesGenerale $observacionesGenerale
 */
?>

<?php echo $this->element('menu_equipo_trabajo'); ?>    

<div class="row">
    <div class="col-md-offset-3" >
        <h2 align="center">Acta del dia</h2>
        <div class="card-block">
                <div class="card p-3">
                    <p class="card-text"><?= $observacionesGeneral->descripcion; ?></p>
                    <p class="text-muted">Por <?= h($observacionesGeneral->user->name . " " . $observacionesGeneral->user->surname ) ?>,creada el <?= h($observacionesGeneral->created->day . " / " .$observacionesGeneral->created->month) ?></p>
                </div>
           
        </div>
    </div>
</div>
         
 