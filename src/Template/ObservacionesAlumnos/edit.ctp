<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno $observacionesAlumno
 */
?>
<div class="observacionesAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($observacionesAlumno) ?>
    <fieldset>
        <legend><?= __('Edit Observaciones Alumno') ?></legend>
        <?php
            echo $this->Form->control('observaciones');
            echo $this->Form->control('tags');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
