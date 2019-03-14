<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alumno $alumno
 */
?>
<div class="alumnos view large-9 medium-8 columns content">
    <h3><?= h($alumno->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($alumno->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edad') ?></th>
            <td><?= h($alumno->surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Procedencia') ?></th>
            <td><?= h($alumno->procedencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Edad') ?></th>
            <td><?= $this->Number->format($alumno->age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($alumno->tel) ?></td>
        </tr>
       
    </table>
    <div class="row">
        <h4><?= __('Observation') ?></h4>
        <?= $this->Text->autoParagraph(h($alumno->observation)); ?>
    </div>
    <div class="related">
        <h4><?= __('Procesos') ?></h4>
       
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            
            <tr>
                <td class="actions">
                   <?= $this->Html->link(__('Nuevo Proceso |'), ['controller' => 'ProcesoAlumnos', 'action' => 'add', $alumno->id]) ?>
                    <?= $this->Html->link(__(' Ver Proceso |'), ['controller' => 'ProcesoAlumnos', 'action' => 'index', $alumno->id]) ?>
                    <?= $this->Html->link(__('Nueva Observacion |'), ['controller' => 'ObservacionesAlumnos', 'action' => 'add', $alumno->id]) ?>
                     <?= $this->Html->link(__('Observaciones'), ['controller' => 'ObservacionesAlumnos', 'action' => 'index', $alumno->id]) ?>
                </td>
            </tr>
            
        </table>
       
    </div>
</div>
