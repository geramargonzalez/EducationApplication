<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TallerAlumno $tallerAlumno
 */
?>
<div class="tallerAlumnos form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Agregar alumnos a taller de ' . $taller->name) ?></legend>
        <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Agregar') ?></th>
                        </tr>
                     </thead>
                    <tbody>
                    <?php foreach ($alumnos as $alumno): ?>
                        <tr>
                            <td><?= h($alumno->name . " " . $alumno->surname) ?></td>
                            <td class="actions" style="white-space:nowrap">
                                <?= $this->Form->control($alumno->id, ['type'=>'checkbox','label'=>false,'class'=>'form-check-input checkbox','id' => $alumno->id]); ?>                                                
                            </td>
                        </tr>
                    <?php endforeach; ?>                 
                    </tbody>
                </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
