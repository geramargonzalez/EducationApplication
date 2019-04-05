<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoRendimiento $tipoRendimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Rendimiento'), ['action' => 'edit', $tipoRendimiento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Rendimiento'), ['action' => 'delete', $tipoRendimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoRendimiento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Rendimiento'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Rendimiento'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoRendimiento view large-9 medium-8 columns content">
    <h3><?= h($tipoRendimiento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($tipoRendimiento->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipoRendimiento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tipoRendimiento->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tipoRendimiento->modified) ?></td>
        </tr>
    </table>
</div>
