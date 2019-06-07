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
                        <h1 align="center"><?= __('Alumnos') ?></h1>
                        <p class="text-muted m-b-30 font-14" align="center">Se muestran todos los estudiantes que pertenecen a todos los centros en donde trabajas.</p>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th data-priority="1"><?= $this->Paginator->sort('Avatar') ?></th>
                                        <th data-priority="1"><?= $this->Paginator->sort('Nombre Completo') ?></th>
                                        <th data-priority="1" class="actions"><?= __('Evaluar') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($alumnos as $alumno): ?>
                                        <tr>
                                            <td><?= $alumno->image == "Null" ? $this->Html->image('../images/users/avatar-1.jpg', ['height' => 40,'class' => 'rounded-circle']) : $this->Html->image($alumno->image, ['height' => 40,'class' => 'rounded-circle'])
                                             ?></td>
                                            
                                            <td ><?= h($alumno->name ." " .$alumno->surname) ?></td>                                          
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




