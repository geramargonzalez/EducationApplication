<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcesoAlumno $procesoAlumno
 */
?>

<div class="procesoAlumnos view large-9 medium-8 columns content">
    <h3><?= h($procesoAlumno->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($procesoAlumno->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Alumno') ?></th>
            <td><?= $this->Number->format($procesoAlumno->id_alumno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conducta') ?></th>
            <td><?= $this->Number->format($procesoAlumno->conducta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rendimiento') ?></th>
            <td><?= $this->Number->format($procesoAlumno->rendimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expresion Oral') ?></th>
            <td><?= $this->Number->format($procesoAlumno->expresion_oral) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($procesoAlumno->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($procesoAlumno->modified) ?></td>
        </tr>
    </table>
</div>
