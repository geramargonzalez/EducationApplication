<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centro[]|\Cake\Collection\CollectionInterface $centro
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
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>                                               
                                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                            <?php foreach ($centro as $centro): ?>
                                            <tr>
                                                <td><?= h($centro->name) ?></td>
                                                <td><?= h($centro->direccion) ?></td>
                                                <td><?= h($centro->tel) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('View'), ['action' => 'view', $centro->id]) ?>
                                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $centro->id]) ?>
                                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $centro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $centro->id)]) ?>
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
  
