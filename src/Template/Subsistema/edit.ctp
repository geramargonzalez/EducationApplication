<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subsistema $subsistema
 */
?>

<div class="subsistema form large-9 medium-8 columns content">
    <?= $this->Form->create($subsistema) ?>
    <fieldset>
        <legend><?= __('Edit Subsistema') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
