<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subsistema $subsistema
 */
?>

<div class="subsistema view large-9 medium-8 columns content">
    <h3><?= h($subsistema->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subsistema->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subsistema->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($subsistema->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($subsistema->modified) ?></td>
        </tr>
    </table>
</div>
