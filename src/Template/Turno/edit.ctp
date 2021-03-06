<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Turno $turno
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $turno->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $turno->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Turno'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="turno form large-9 medium-8 columns content">
    <?= $this->Form->create($turno) ?>
    <fieldset>
        <legend><?= __('Edit Turno') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('id_centro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
