<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoEvaluacion $tipoEvaluacion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tipoEvaluacion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tipoEvaluacion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tipo Evaluacion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tipoEvaluacion form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoEvaluacion) ?>
    <fieldset>
        <legend><?= __('Edit Tipo Evaluacion') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
