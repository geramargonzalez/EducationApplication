<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesercionAlumno $desercionAlumno
 */
?>
<div class="desercionAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($desercionAlumno) ?>
    <fieldset>
        <legend><?= __('Editar desercion') ?></legend>
        <?php
            echo $this->Form->control('id_alumno');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
