<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoRendimiento[]|\Cake\Collection\CollectionInterface $tipoRendimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tipo Rendimiento'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoRendimiento index large-9 medium-8 columns content">
    <h3><?= __('Tipo Rendimiento') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoRendimiento as $tipoRendimiento): ?>
            <tr>
                <td><?= $this->Number->format($tipoRendimiento->id) ?></td>
                <td><?= h($tipoRendimiento->nombre) ?></td>
                <td><?= h($tipoRendimiento->created) ?></td>
                <td><?= h($tipoRendimiento->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipoRendimiento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoRendimiento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoRendimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoRendimiento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
