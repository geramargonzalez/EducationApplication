<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alumno $alumno
 */
?>
<div class="alumnos form large-9 medium-8 columns content">
    <?= $this->Form->create($alumno) ?>
    <fieldset>
        <legend><?= __('Agregar estudiante') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('surname');
            echo $this->Form->control('age');
            echo $this->Form->control('ci');
            echo $this->Form->control('procedencia');
            echo $this->Form->control('tel');
            echo $this->Form->control('observation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
 