<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesercionAlumno $desercionAlumno
 */
?>
<div class="desercionAlumnos view large-9 medium-8 columns content">
    <h3><?= h($desercionAlumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($desercionAlumno->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($desercionAlumno->created) ?></td>
        </tr>
       
    </table>
</div>
