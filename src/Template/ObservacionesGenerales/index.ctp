<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno[]|\Cake\Collection\CollectionInterface $observacionesAlumnos
 */
//$time = \Cake\I18n\Time::now();
?>

<?php echo $this->element('menu_equipo_trabajo'); ?>    

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
                        <h4 class="mt-0 header-title"><?= __('Observaciones Generales') ?></h4>
                        <p class="text-muted m-b-30 font-14">This is an experimental awesome solution for responsive tables with complex data.</p>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th data-priority="1"><?= $this->Paginator->sort('Motivo') ?></th>
                                        <th data-priority="1"><?= $this->Paginator->sort('Fecha') ?></th>
                            
                                          <th data-priority="1" class="actions"><?= __('Actions') ?></th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($observacionesGenerales as $observacionesGeneral): ?>
                                        <tr>
                                            <td><?= h($observacionesGeneral->descripcion) ?></td>
                                               <td><?= h($observacionesGeneral->created->day .' / '.$observacionesGeneral->created->month) ?></td>
                                            <?php if($user_session['id'] == $observacionesGeneral->id_user){ ?>                                        
                                            <td class="actions">

                                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $observacionesGeneral->id]) ?>
                                                 <?= $this->Html->link(__('Editar'), ['action' => 'edit', $observacionesGeneral->id]) ?>
                                            </td>
                                             <?php } ?> 
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






