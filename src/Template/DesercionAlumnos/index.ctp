<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DesercionAlumno[]|\Cake\Collection\CollectionInterface $desercionAlumnos
 */
?>
<div class="page-content-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-block">
                             <h3></h3>
                            <h4 class="mt-0 header-title"><?= __('Alumnos') ?></h4>
                            <p class="text-muted m-b-30 font-14">This is an experimental awesome solution for responsive tables with complex data.</p>
                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                       <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre completo') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                      <tbody>
                                        <?php foreach ($desercionAlumnos as $desercionAlumno): ?>
                                        <tr>
                                            <td><?= h($desercionAlumno->alumno->name . " " . $desercionAlumno->alumno->surname) ?>
                                                </td>
                                            <td><?= h($desercionAlumno->descripcion) ?></td>
                                            <td><?= h($desercionAlumno->created) ?></td>
                                            <td><?= h($desercionAlumno->modified) ?></td>
                                            <td class="actions">
                                                <?= $this->Html->link(__('View'), ['action' => 'view', $desercionAlumno->id]) ?>
                                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $desercionAlumno->id]) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $desercionAlumno->id], ['confirm' => __('Are you sure you want to delete # {0}?', $desercionAlumno->id)]) ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

     </div><!-- container -->
        
</div> <!-- Page content Wrapper -->





