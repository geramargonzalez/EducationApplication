<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alumno[]|\Cake\Collection\CollectionInterface $alumnos
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
                                        <th data-priority="1"><?= $this->Paginator->sort('C.I') ?></th>
                                        <th data-priority="1"><?= $this->Paginator->sort('Nombre') ?></th>
                                        <th data-priority="1" class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($alumnos as $alumno): ?>
                                        <tr>
                                            <td><?= $this->Number->format($alumno->ci) ?></td>
                                            <td><?= h($alumno->name ." " .$alumno->surname) ?></td>                                          
                                            <td class="actions">
                                                <?= $this->Html->link(__('Proceso'), ['action' => 'view', $alumno->id]) ?>
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




