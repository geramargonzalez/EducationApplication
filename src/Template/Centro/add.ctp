<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centro $centro
 */
?>

<div class="centro form large-9 medium-8 columns content">
    <?= $this->Form->create($centro) ?>
    <fieldset>
        <legend><?= __('Add Centro') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('direccion');
            echo $this->Form->control('tel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
