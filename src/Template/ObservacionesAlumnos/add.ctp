<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno $observacionesAlumno
 */
?>
<div class="observacionesAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($observacionesAlumno) ?>
    <fieldset>
        <legend><?= __('Observación: ' . $alumno->name . " " . $alumno->surname) ?></legend>
        <?php
            echo $this->Form->control('observaciones');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
 