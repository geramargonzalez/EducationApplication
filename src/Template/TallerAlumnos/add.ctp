<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TallerAlumno $tallerAlumno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Taller Alumnos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tallerAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($tallerAlumno) ?>
    <fieldset>
        <legend><?= __('Add Taller Alumno') ?></legend>
        <?php
            echo $this->Form->control('id_taller');
            echo $this->Form->control('id_alumno');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
