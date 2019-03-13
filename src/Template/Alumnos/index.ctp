<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alumno[]|\Cake\Collection\CollectionInterface $alumnos
 */
?>
<div class="alumnos index large-9 medium-8 columns content">
    <h3><?= __('Alumnos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('surname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age') ?></th>
                <th scope="col"><?= $this->Paginator->sort('procedencia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td><?= $this->Number->format($alumno->id) ?></td>
                <td><?= h($alumno->name) ?></td>
                <td><?= h($alumno->surname) ?></td>
                <td><?= $this->Number->format($alumno->age) ?></td>
                <td><?= h($alumno->procedencia) ?></td>
                <td><?= h($alumno->created) ?></td>
                <td><?= h($alumno->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $alumno->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $alumno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $alumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alumno->id)]) ?>
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
