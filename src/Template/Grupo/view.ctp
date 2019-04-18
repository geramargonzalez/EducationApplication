<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grupo $grupo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grupo'), ['action' => 'edit', $grupo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grupo'), ['action' => 'delete', $grupo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $grupo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grupo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grupo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="grupo view large-9 medium-8 columns content">
    <h3><?= h($grupo->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($grupo->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($grupo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Centro') ?></th>
            <td><?= $this->Number->format($grupo->id_centro) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Turno') ?></th>
            <td><?= $this->Number->format($grupo->id_turno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($grupo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($grupo->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Alumnos') ?></h4>
        <?php if (!empty($grupo->alumnos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ci') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Surname') ?></th>
                <th scope="col"><?= __('Age') ?></th>
                <th scope="col"><?= __('Procedencia') ?></th>
                <th scope="col"><?= __('Observation') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Tel') ?></th>
                <th scope="col"><?= __('Id Taller') ?></th>
                <th scope="col"><?= __('Id Centro') ?></th>
                <th scope="col"><?= __('Id Turno') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($grupo->alumnos as $alumnos): ?>
            <tr>
                <td><?= h($alumnos->id) ?></td>
                <td><?= h($alumnos->ci) ?></td>
                <td><?= h($alumnos->name) ?></td>
                <td><?= h($alumnos->surname) ?></td>
                <td><?= h($alumnos->age) ?></td>
                <td><?= h($alumnos->procedencia) ?></td>
                <td><?= h($alumnos->observation) ?></td>
                <td><?= h($alumnos->created) ?></td>
                <td><?= h($alumnos->modified) ?></td>
                <td><?= h($alumnos->image) ?></td>
                <td><?= h($alumnos->tel) ?></td>
                <td><?= h($alumnos->id_taller) ?></td>
                <td><?= h($alumnos->id_centro) ?></td>
                <td><?= h($alumnos->id_turno) ?></td>
                <td><?= h($alumnos->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Alumnos', 'action' => 'view', $alumnos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Alumnos', 'action' => 'edit', $alumnos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Alumnos', 'action' => 'delete', $alumnos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alumnos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
