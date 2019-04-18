<?php

?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create() ?>
    <fieldset>
        <div ><?= $this->Html->link(__('Agregar Centro'), ['controller' => 'Centro', 'action' => 'add']) ?></div>
        <legend><?= __('Agregar Centro y al usuario ' . $user_session['name']) ?></legend>        
        <?php
            echo $this->Form->control('turnos');
            echo $this->Form->control('centros');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>