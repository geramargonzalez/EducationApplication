<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller $taller
 */
?>
<div class="taller view large-9 medium-8 columns content">
    <h3><?= h($taller->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($taller->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($taller->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Profesor') ?></th>
            <td><?= $this->Number->format($taller->id_user) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($taller->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($taller->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Alumnos') ?></h4>
        <?php if (!empty($taller->alumnos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Surname') ?></th>
                <th scope="col"><?= __('Age') ?></th>
                <th scope="col"><?= __('Procedencia') ?></th>
                <th scope="col"><?= __('Observation') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($taller->alumnos as $alumnos): ?>
            <tr>
                <td><?= h($alumnos->id) ?></td>
                <td><?= h($alumnos->name) ?></td>
                <td><?= h($alumnos->surname) ?></td>
                <td><?= h($alumnos->age) ?></td>
                <td><?= h($alumnos->procedencia) ?></td>
                <td><?= h($alumnos->observation) ?></td>
                <td><?= h($alumnos->created) ?></td>
                <td><?= h($alumnos->modified) ?></td>
                <td><?= h($alumnos->image) ?></td>
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
