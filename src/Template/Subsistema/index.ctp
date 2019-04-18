<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subsistema[]|\Cake\Collection\CollectionInterface $subsistema
 */

?>

<div class="subsistema index large-9 medium-8 columns content">
    <h3><?= __('Subsistema') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subsistema as $subsistema): ?>
            <tr>
                <td><?= h($subsistema->name) ?></td>
                <td><?= h($subsistema->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $subsistema->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $subsistema->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $subsistema->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subsistema->id)]) ?>
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
