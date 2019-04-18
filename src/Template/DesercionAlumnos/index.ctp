<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesercionAlumno[]|\Cake\Collection\CollectionInterface $desercionAlumnos
 */
?>

<div class="desercionAlumnos index large-9 medium-8 columns content">
    <h3><?= __('Desercion Alumnos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Nombre completo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($desercionAlumnos as $desercionAlumno): ?>
            <tr>
                <td><?= 
                     $this->cell('Useful::name',['id'=> $desercionAlumno->id_alumno]);
                ?></td>
                <td><?= h($desercionAlumno->descripcion) ?></td>
                <td><?= h($desercionAlumno->created) ?></td>
                <td><?= h($desercionAlumno->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $desercionAlumno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $desercionAlumno->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $desercionAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $desercionAlumno->id)]) ?>
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
