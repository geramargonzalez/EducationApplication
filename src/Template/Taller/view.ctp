<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller $taller
 */
?>
<div class="taller view large-9 medium-8 columns content">
    <h3><?= h("Materia: " . $taller->name) ?></h3>
    <table class="vertical-table">
         <?php if($user != null) { ?>
        <tr>
            <th scope="row"><?= __('Profesor') ?></th>
            <td><?= h($user->name . " " . $user->surname) ?></td>
        </tr>
        <?php } else { ?>
            <tr>
                <th scope="row"><?= __('Profesor') ?></th>
                <td><?= h("No tiene docente definido") ?></td>
            </tr>
          <?php }  ?>
        <?php if($taller->role_id == 5) { ?>
        <tr>
            <th scope="row"><?= __('Cantidad de alumnos') ?></th>
            <td><?= h($cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agregar Alumnos') ?></th>
            <td> <?= $this->Html->link(__('add'), ['controller' => 'Alumnos', 'action' => 'addAlumnosToTaller', $taller->id]) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Estadisticas del taller') ?></th>
            <td> <?= $this->Html->link(__('Ver'), ['controller' => 'ProcesoAlumnos', 'action' => 'statsTaller', $taller->id]) ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php if($taller->role_id == 5) { ?>
    <div class="related">
        <h4><?= __('Alumnos inscriptos') ?></h4>
        <?php if (!empty($alumnos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellido') ?></th>
                <th scope="col"><?= __('Edad') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($alumnos as $alumno): ?>
            <tr>
                <td><?= h($alumno->name) ?></td>
                <td><?= h($alumno->surname) ?></td>
                <td><?= h($alumno->age) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Alumnos', 'action' => 'view', $alumno->id]) ?>
                    <?= $this->Form->postLink(__('Quitar'), ['controller' => 'Alumnos', 'action' => 'deleteByAlumno', $alumno->id,$taller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alumno->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
  <?php } ?>
</div>
