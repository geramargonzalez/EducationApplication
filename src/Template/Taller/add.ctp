<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller $taller
 */
?>
<div class="taller form large-9 medium-8 columns content">
    <?= $this->Form->create($taller) ?>
    <fieldset>
        <legend><?= __('Agregar Taller') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('id_user', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
