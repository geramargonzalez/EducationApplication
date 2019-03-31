<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centro[]|\Cake\Collection\CollectionInterface $centro
 */
?>

<div class="centro index large-9 medium-8 columns content">
    <h3><?= __('Centro') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($centro as $centro): ?>
            <tr>
                <td><?= $this->Number->format($centro->id) ?></td>
                <td><?= h($centro->name) ?></td>
                <td><?= h($centro->direccion) ?></td>
                <td><?= h($centro->tel) ?></td>
                <td><?= h($centro->modified) ?></td>
                <td><?= h($centro->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $centro->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $centro->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $centro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $centro->id)]) ?>
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
