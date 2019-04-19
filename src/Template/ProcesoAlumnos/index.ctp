<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcesoAlumno[]|\Cake\Collection\CollectionInterface $procesoAlumnos
 */
?>

 <?php echo $this->element('menu_proceso'); ?>    

 <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-block">

                    <h4 class="mt-0 header-title">Tabla con toos los evaluados ingresados</h4>
                    <p class="text-muted m-b-30 font-14"></p>

                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Datos diarios</th>
                                <th scope="col"><?= $this->Paginator->sort('Conducta') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Rendimiento') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Expresion oral') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Promedio Diario') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                              <tbody>
                                <?php foreach ($procesoAlumnos as $procesoAlumno): ?>
                                <tr>
                                    <td></td>
                                    <td><?= $this->Number->format($procesoAlumno->conducta) ?></td>
                                    <td><?= $this->Number->format($procesoAlumno->rendimiento) ?></td>
                                    <td><?= $this->Number->format($procesoAlumno->expresion_oral) ?></td>
                                    <td><?= h($procesoAlumno->created->day .' / '.$procesoAlumno->created->month) ?></td>
                                    <td><?= $this->Number->format($procesoAlumno->promedio) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $procesoAlumno->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $procesoAlumno->id]) ?>

                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $procesoAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $procesoAlumno->id)]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <tfoot>
                       <tr>
                        <td scope="col">Totales</td>
                        <td><?= $this->Number->format(round($avg_conducta)) ?></td>
                        <td><?= $this->Number->format(round($avg_rendimiento)) ?></td>
                        <td><?= $this->Number->format(round($avg_expresionOral)) ?></td>
                         <td scope="col"></td>
                         <td scope="col"><?= $this->Number->format(round($avg_general)) ?></td>
                         <td class="actions">
                               <?= $this->Html->link(__('Estadisticas'), ['controller' => 'ProcesoAlumnos', 'action' => 'statsAlumnos', $alumno->id]) ?>
                        </td>
                    </tr>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
