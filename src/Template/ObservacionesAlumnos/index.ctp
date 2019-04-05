<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno[]|\Cake\Collection\CollectionInterface $observacionesAlumnos
 */
?>

<div class="observacionesAlumnos index large-9 medium-8 columns content">
    <h3><?= __('Observaciones del estudiante: ' . $alumno->name . " " . $alumno->surname ) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('observaciones') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($observacionesAlumnos as $observacionesAlumno): ?>
            <tr>
                <td><?= h($observacionesAlumno->observaciones)?></td>
                <td><?= h($observacionesAlumno->created->day . " / " . $observacionesAlumno->created->month) ?></td>               
                <td class="actions">
                    <?= $this->Html->link(__('Detalle'), ['action' => 'view', $observacionesAlumno->id, $alumno->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $observacionesAlumno->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $observacionesAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $observacionesAlumno->id)]) ?>
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
