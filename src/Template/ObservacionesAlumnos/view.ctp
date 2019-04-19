<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno $observacionesAlumno
 */
?>
<?php echo $this->element('menu_proceso'); ?>    
 <div class="row">
    <div class="col-12">
        <h4 class="m-t-20 m-b-20">Detalle de la observacion</h4>
        <div class="card-columns">
            <div class="card m-b-20">
                <div class="card-block">
                    <h4 class="card-title font-20 mt-0"><?= h($alumno->name . " " . $alumno->surname) ?></h4>
                    <?= $this->Text->autoParagraph($observacionesAlumno->observaciones); ?>

                    <p class="text-muted">Por <?= h($user->name . " " . $user->surname ) ?>,creada <?= h($observacionesAlumno->created->day . " / " .$observacionesAlumno->created->month) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
         