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
                                    <table id="tech-companies-1" class="table  table-striped">
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

<div class="col-lg-6">
    <div class="card m-b-20">
        <div class="card-block">
            <nav class="paginator">
                <ul class="pagination justify-content-end">
                    <li class="page-item"><?= $this->Paginator->first('<< ' . __('first'),['class' =>'page-link']) ?></li>
                    <li class="page-item"><?=$this->Paginator->prev('< ' . __('previous'),['class' =>'page-link']) ?></li>
                    <li class="page-item"><?=$this->Paginator->numbers() ?></li>
                    <li class="page-item">
                        <?= $this->Paginator->next(__('next') . ' >',['class' =>'page-link']) ?>
                    </li>
                     <li class="page-item">
                        <?= $this->Paginator->last(__('last') . ' >>',['class' =>'page-link']) ?>
                    </li>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </nav>
         </div>
    </div>
</div>


