<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turno[]|\Cake\Collection\CollectionInterface $turno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Turno'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="turno index large-9 medium-8 columns content">
    <h3><?= __('Turno') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_centro') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($turno as $turno): ?>
            <tr>
                <td><?= $this->Number->format($turno->id) ?></td>
                <td><?= h($turno->nombre) ?></td>
                <td><?= $this->Number->format($turno->id_centro) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $turno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $turno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $turno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $turno->id)]) ?>
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
