<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RendimientoAlumno $rendimientoAlumno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rendimiento Alumno'), ['action' => 'edit', $rendimientoAlumno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rendimiento Alumno'), ['action' => 'delete', $rendimientoAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rendimientoAlumno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rendimiento Alumno'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rendimiento Alumno'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rendimientoAlumno view large-9 medium-8 columns content">
    <h3><?= h($rendimientoAlumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rendimientoAlumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Alumno') ?></th>
            <td><?= $this->Number->format($rendimientoAlumno->id_alumno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Evaluacion') ?></th>
            <td><?= $this->Number->format($rendimientoAlumno->tipo_evaluacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rendimiento') ?></th>
            <td><?= $this->Number->format($rendimientoAlumno->rendimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($rendimientoAlumno->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($rendimientoAlumno->modified) ?></td>
        </tr>
    </table>
</div>
