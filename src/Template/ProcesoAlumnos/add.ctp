<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcesoAlumno $procesoAlumno
 */
?>
<div class="procesoAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($procesoAlumno) ?>
    <fieldset>
        <legend><?= __('Proceso diario: ' . $alumno->name . " " . $alumno->surname) ?></legend>
        <?php
            echo $this->Form->control('conducta');
            echo $this->Form->control('tipoevaluacion', ['options' => $tipoEvaluacion]);
            echo $this->Form->control('rendimiento');
            echo $this->Form->control('expresion_oral');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
