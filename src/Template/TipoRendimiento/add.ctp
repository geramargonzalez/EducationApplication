<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoRendimiento $tipoRendimiento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tipo Rendimiento'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tipoRendimiento form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoRendimiento) ?>
    <fieldset>
        <legend><?= __('Add Tipo Rendimiento') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
