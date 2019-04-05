<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller[]|\Cake\Collection\CollectionInterface $taller
 */
?>
<div class="taller index large-9 medium-8 columns content">
    <h3><?= __('Materia') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Materia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Turno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($talleres as $taller): ?>
            <tr>
                <td><?= h($taller->name) ?></td>
                 <td><?= $taller->id_turno == 1 ? "Matutino" : "Vespertino"; ?></td>
                <td><?= h($taller->created->day . " / " .$taller->created->month) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $taller->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $taller->id]) ?>
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
