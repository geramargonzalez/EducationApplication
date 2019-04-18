<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesercionAlumno $desercionAlumno
 */
?>
>
<div class="desercionAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($desercionAlumno) ?>
    <fieldset>
        <legend><?= __('Nueva desercion') ?></legend>
        <?php
            echo $this->Form->control('alumnos');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
