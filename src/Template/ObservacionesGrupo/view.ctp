<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesGrupo $observacionesGrupo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Observaciones Grupo'), ['action' => 'edit', $observacionesGrupo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Observaciones Grupo'), ['action' => 'delete', $observacionesGrupo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $observacionesGrupo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Observaciones Grupo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Observaciones Grupo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="observacionesGrupo view large-9 medium-8 columns content">
    <h3><?= h($observacionesGrupo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($observacionesGrupo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Grupo') ?></th>
            <td><?= $this->Number->format($observacionesGrupo->id_grupo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($observacionesGrupo->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($observacionesGrupo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($observacionesGrupo->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($observacionesGrupo->descripcion)); ?>
    </div>
</div>
