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
                        <h4 class="mt-0 header-title"><?= __('Asistencia General') ?></h4>
                        <p class="text-muted m-b-30 font-14">Asistencia general al centro educativo.</p>
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th data-priority="1"><?= $this->Paginator->sort('Faltas') ?></th>
                                        <th data-priority="1"><?= $this->Paginator->sort('Horas') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            <td><strong><?= $this->Number->format($faltasTotales) ?></strong></td>
                                            <td><strong><?= $this->Number->format($horasTotales) ?></strong></td>
                                        </tr>
                                       
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




