<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcesoAlumno $procesoAlumno
 */
?>

<div class="procesoAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($procesoAlumno) ?>
    <fieldset>
        <legend><?= __('Edit Proceso Alumno') ?></legend>
        <?php
            echo $this->Form->control('id_alumno');
            echo $this->Form->control('conducta');
            echo $this->Form->control('rendimiento');
            echo $this->Form->control('expresion_oral');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
