<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Agregar Docente') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('surname');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('image');
            echo $this->Form->control('role_id');
            echo $this->Form->control('talleres');
            echo $this->Form->control('turnos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
