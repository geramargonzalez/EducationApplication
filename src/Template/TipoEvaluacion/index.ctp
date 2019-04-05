<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoEvaluacion[]|\Cake\Collection\CollectionInterface $tipoEvaluacion
 */
?>

<div class="tipoEvaluacion index large-9 medium-8 columns content">
    <h3><?= __('Tipo de evaluación') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoEvaluacion as $tipoEvaluacion): ?>
            <tr>
                <td><?= $this->Number->format($tipoEvaluacion->id) ?></td>
                <td><?= h($tipoEvaluacion->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipoEvaluacion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoEvaluacion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoEvaluacion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoEvaluacion->id)]) ?>
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
