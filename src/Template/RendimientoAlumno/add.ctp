<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RendimientoAlumno $rendimientoAlumno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Rendimiento Alumno'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rendimientoAlumno form large-9 medium-8 columns content">
    <?= $this->Form->create($rendimientoAlumno) ?>
    <fieldset>
        <legend><?= __('Add Rendimiento Alumno') ?></legend>
        <?php
            echo $this->Form->control('id_alumno');
            echo $this->Form->control('tipo_evaluacion');
            echo $this->Form->control('rendimiento');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
