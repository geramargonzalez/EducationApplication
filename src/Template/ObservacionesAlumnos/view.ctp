<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno $observacionesAlumno
 */
?>
<div class="observacionesAlumnos view large-9 medium-8 columns content">
    <h3><?= h($alumno->name . " " . $alumno->surname) ?></h3>
    <table class="vertical-table">
         <tr>
            <th scope="row"><?= __('Docente') ?></th>
            <td><?= h($user->name . " " . $user->surname ) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($observacionesAlumno->created->day . " / " .$observacionesAlumno->created->month) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observaciones') ?></h4>
        <?= $this->Text->autoParagraph(h($observacionesAlumno->observaciones)); ?>
    </div>
</div>
