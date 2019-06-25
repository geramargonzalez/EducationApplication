<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesGrupo $observacionesGrupo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $observacionesGrupo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $observacionesGrupo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Observaciones Grupo'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="observacionesGrupo form large-9 medium-8 columns content">
    <?= $this->Form->create($observacionesGrupo) ?>
    <fieldset>
        <legend><?= __('Edit Observaciones Grupo') ?></legend>
        <?php
            echo $this->Form->control('id_grupo');
            echo $this->Form->control('id_user');
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
