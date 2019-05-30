<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evidencia $evidencia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Evidencia'), ['action' => 'edit', $evidencia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Evidencia'), ['action' => 'delete', $evidencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $evidencia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Evidencias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Evidencia'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="evidencias view large-9 medium-8 columns content">
    <h3><?= h($evidencia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($evidencia->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($evidencia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Informe') ?></th>
            <td><?= $this->Number->format($evidencia->id_informe) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($evidencia->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($evidencia->modified) ?></td>
        </tr>
    </table>
</div>
