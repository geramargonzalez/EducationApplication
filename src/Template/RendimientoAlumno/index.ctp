<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RendimientoAlumno[]|\Cake\Collection\CollectionInterface $rendimientoAlumno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rendimiento Alumno'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rendimientoAlumno index large-9 medium-8 columns content">
    <h3><?= __('Rendimiento Alumno') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_alumno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_evaluacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rendimiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rendimientoAlumno as $rendimientoAlumno): ?>
            <tr>
                <td><?= $this->Number->format($rendimientoAlumno->id) ?></td>
                <td><?= $this->Number->format($rendimientoAlumno->id_alumno) ?></td>
                <td><?= $this->Number->format($rendimientoAlumno->tipo_evaluacion) ?></td>
                <td><?= $this->Number->format($rendimientoAlumno->rendimiento) ?></td>
                <td><?= h($rendimientoAlumno->created) ?></td>
                <td><?= h($rendimientoAlumno->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rendimientoAlumno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rendimientoAlumno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rendimientoAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rendimientoAlumno->id)]) ?>
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
