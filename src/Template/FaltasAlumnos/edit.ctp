<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FaltasAlumno $faltasAlumno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $faltasAlumno->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $faltasAlumno->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Faltas Alumnos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="faltasAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($faltasAlumno) ?>
    <fieldset>
        <legend><?= __('Edit Faltas Alumno') ?></legend>
        <?php
            echo $this->Form->control('id_alumno', ['options' => $alumnos]);
            echo $this->Form->control('faltas');
            echo $this->Form->control('cant_horas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
