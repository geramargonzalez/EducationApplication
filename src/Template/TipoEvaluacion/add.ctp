<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoEvaluacion $tipoEvaluacion
 */
?>
<div class="tipoEvaluacion form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoEvaluacion) ?>
    <fieldset>
        <legend><?= __('Tipos de evaluación') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
