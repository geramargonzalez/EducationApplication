<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TallerAlumno $tallerAlumno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Taller Alumno'), ['action' => 'edit', $tallerAlumno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Taller Alumno'), ['action' => 'delete', $tallerAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tallerAlumno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Taller Alumnos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Taller Alumno'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tallerAlumnos view large-9 medium-8 columns content">
    <h3><?= h($tallerAlumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tallerAlumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Taller') ?></th>
            <td><?= $this->Number->format($tallerAlumno->id_taller) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Alumno') ?></th>
            <td><?= $this->Number->format($tallerAlumno->id_alumno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tallerAlumno->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tallerAlumno->modified) ?></td>
        </tr>
    </table>
</div>
