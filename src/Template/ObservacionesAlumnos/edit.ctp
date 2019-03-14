<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno $observacionesAlumno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $observacionesAlumno->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $observacionesAlumno->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Observaciones Alumnos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="observacionesAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($observacionesAlumno) ?>
    <fieldset>
        <legend><?= __('Edit Observaciones Alumno') ?></legend>
        <?php
            echo $this->Form->control('id_alumno');
            echo $this->Form->control('id_user');
            echo $this->Form->control('observaciones');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
