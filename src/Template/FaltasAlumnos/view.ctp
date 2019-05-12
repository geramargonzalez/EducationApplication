<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FaltasAlumno $faltasAlumno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Faltas Alumno'), ['action' => 'edit', $faltasAlumno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Faltas Alumno'), ['action' => 'delete', $faltasAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faltasAlumno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Faltas Alumnos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Faltas Alumno'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="faltasAlumnos view large-9 medium-8 columns content">
    <h3><?= h($faltasAlumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Alumno') ?></th>
            <td><?= $faltasAlumno->has('alumno') ? $this->Html->link($faltasAlumno->alumno->name, ['controller' => 'Alumnos', 'action' => 'view', $faltasAlumno->alumno->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($faltasAlumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Faltas') ?></th>
            <td><?= $this->Number->format($faltasAlumno->faltas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cant Horas') ?></th>
            <td><?= $this->Number->format($faltasAlumno->cant_horas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($faltasAlumno->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($faltasAlumno->modified) ?></td>
        </tr>
    </table>
</div>
