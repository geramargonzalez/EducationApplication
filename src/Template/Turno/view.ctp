<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turno $turno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Turno'), ['action' => 'edit', $turno->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Turno'), ['action' => 'delete', $turno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turno->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Turno'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Turno'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="turno view large-9 medium-8 columns content">
    <h3><?= h($turno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($turno->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($turno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Centro') ?></th>
            <td><?= $this->Number->format($turno->id_centro) ?></td>
        </tr>
    </table>
</div>
