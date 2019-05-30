<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Grupo[]|\Cake\Collection\CollectionInterface $grupo
 */
?>
<div class="page-content-wrapper ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-block">
                         <h3></h3>
                        <h4 class="mt-0 header-title"><?= __('Todos los grupos') ?></h4>
                        <p class="text-muted m-b-30 font-14">This is an experimental awesome solution for responsive tables with complex data.</p>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                  
                                  <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th><?= $this->Paginator->sort('Nombre') ?></th>
                                        <th><?= $this->Paginator->sort('Turno') ?></th>
                                        <th><?= $this->Paginator->sort('Centro') ?></th>
                                        <th><?= __('Acciones') ?></th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    <?php foreach ($grupos as $grupo): ?>
                                    <tr>
                                        <td><?= h($grupo->name) ?></td>
                                        <td><?= $grupo->id_turno == 1 ? "Matutino" : "Vespertino"; ?></td>
                                        <td><?= $grupo->centro->name ?></td>
                                        
                                        <td class="actions">
                                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $grupo->id],['class'=>'btn btn-success btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $grupo->id],['class'=>'btn btn-warning btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                          
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

