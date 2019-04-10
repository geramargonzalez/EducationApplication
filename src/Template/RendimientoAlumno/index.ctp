<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RendimientoAlumno[]|\Cake\Collection\CollectionInterface $rendimientoAlumno
 */
?>

<div class="rendimientoAlumno index large-9 medium-8 columns content">
    <h3><?= __('Rendimiento Alumno: ' . $alumno->name ." " . $alumno->surname) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Tipo de evaluacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Rendimiento promedio ') ?></th>
              
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipo_evaluacion as $tipo): ?>
            <tr>
                <td><?= h($tipo['tipo_evaluacion']) ?></td>
                <td><?= $this->Number->format($tipo['rendimiento']) ?></td>
               
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
