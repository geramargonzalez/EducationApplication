<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcesoAlumno[]|\Cake\Collection\CollectionInterface $procesoAlumnos
 */
?>
<div class="procesoAlumnos index large-9 medium-8 columns content">
    <h3><?= __('Proceso Alumno: ' . $alumno->name  . " " . $alumno->surname) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              
                <th scope="col">Datos diarios</th>
                <th scope="col"><?= $this->Paginator->sort('Conducta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Rendimiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Expresion oral') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Promedio Diario') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($procesoAlumnos as $procesoAlumno): ?>
            <tr>
                <td></td>
                <td><?= $this->Number->format($procesoAlumno->conducta) ?></td>
                <td><?= $this->Number->format($procesoAlumno->rendimiento) ?></td>
                <td><?= $this->Number->format($procesoAlumno->expresion_oral) ?></td>
                <td><?= h($procesoAlumno->created->day .' / '.$procesoAlumno->created->month) ?></td>
                <td><?= $this->Number->format($procesoAlumno->promedio) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $procesoAlumno->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $procesoAlumno->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $procesoAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $procesoAlumno->id)]) ?>
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
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Promedios</th>
                <th scope="col"><?= $this->Paginator->sort('Prom/Conducta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Prom/Rendim') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('Prom/Exp. Oral') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('Prom/General') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="col"></td>
                <td><?= $this->Number->format(round($avg_conducta)) ?></td>
                <td><?= $this->Number->format(round($avg_rendimiento)) ?></td>
                <td><?= $this->Number->format(round($avg_expresionOral)) ?></td>
                 <td scope="col"></td>
                 <td scope="col"><?= $this->Number->format(round($avg_general)) ?></td>
                 <td class="actions">
                       <?= $this->Html->link(__('Estadisticas'), ['controller' => 'ProcesoAlumnos', 'action' => 'statsAlumnos', $alumno->id]) ?>
                </td>

               

            </tr>
        </tbody>
    </table>
 
</div>
