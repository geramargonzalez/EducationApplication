<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoEvaluacion $tipoEvaluacion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Evaluacion'), ['action' => 'edit', $tipoEvaluacion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Evaluacion'), ['action' => 'delete', $tipoEvaluacion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoEvaluacion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Evaluacion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Evaluacion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoEvaluacion view large-9 medium-8 columns content">
    <h3><?= h($tipoEvaluacion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($tipoEvaluacion->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipoEvaluacion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tipoEvaluacion->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tipoEvaluacion->modified) ?></td>
        </tr>
    </table>
</div>
