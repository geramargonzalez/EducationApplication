<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller[]|\Cake\Collection\CollectionInterface $taller
 */
?> 
 <?php echo $this->element('menu_equipo_trabajo'); ?>    
<div class="page-content-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-block">
                             <h3></h3>
                            <h4 class="mt-0 header-title"><?= __('Equipo de Trabajo') ?></h4>
                            <p class="text-muted m-b-30 font-14">Materias que componen el equipo de trabajo</p>

                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Materia') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Turno') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Centro') ?></th>
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($talleres as $taller): ?>
                                            <tr>
                                                <td><?= h($taller->name) ?></td>
                                                 <td><?= $taller->id_turno == 1 ? "Matutino" : "Vespertino"; ?></td>
                                                <td><?= h($taller->centro->name) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $taller->id],['class'=>'btn btn-warning btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
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
