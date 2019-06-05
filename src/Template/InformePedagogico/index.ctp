<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformePedagogico[]|\Cake\Collection\CollectionInterface $informePedagogico
 */
?>
<div class="page-content-wrapper ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-block">
                         <h3></h3>
                        <h4 class="mt-0 header-title"><?= __('Todos los informes') ?></h4>
                        <p class="text-muted m-b-30 font-14">Se muestran todos los informes pedagogicos creados.</p>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th scope="col"><?= $this->Paginator->sort('Titulo del informe') ?></th>
                                         <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                        <th data-priority="1" class="actions"><?= __('Acciones') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($informePedagogico as $informePedagogico): ?>
                                        <tr>
                                           <td><?= h($informePedagogico->titulo) ?></td>
                                            <td><?= h($informePedagogico->created) ?></td>                                          
                                            <td class="actions">
                    
                                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $informePedagogico->id],['class'=>'btn btn-warning btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $informePedagogico->id],['class'=>'btn btn-info btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                                <?= $this->Html->link(__('Eliminar'), ['action' => 'delete', $informePedagogico->id],['class'=>'btn btn-danger btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
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





