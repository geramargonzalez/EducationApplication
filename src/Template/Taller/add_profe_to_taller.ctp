<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller $taller
 */
?>
<div class="taller form large-9 medium-8 columns content">
    <?= $this->Form->create($taller) ?>
    <fieldset>
        <legend><?= __('Agregar materia') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('role_id');
            echo $this->Form->control('turnos');
            echo $this->Form->control('centros');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
  