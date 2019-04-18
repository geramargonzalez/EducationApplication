<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subsistema $subsistema
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Subsistema'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="subsistema form large-9 medium-8 columns content">
    <?= $this->Form->create($subsistema) ?>
    <fieldset>
        <legend><?= __('Add Subsistema') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
