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
                        <h3 class="mt-0 header-title"><?= __('Asistencia general del dia ' . $time->format('d/m/y')) ?></h3>
                        <p class="text-muted m-b-30 font-14">Asistencia general de todos los estudiantes del centro.</p>
                        <div class="table-rep-plugin">
                             
                           <table id="datatable" class="table table-bordered">
                                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th data-priority="1"><?= $this->Paginator->sort('Faltas totales por dia') ?></th>
                                        <th data-priority="1"><?= $this->Paginator->sort('Cantidad de horas totales') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            <td><strong><?= $this->Number->format($faltasTotalesDia) ?></strong></td>
                                            <td><strong><?= $this->Number->format($horasTotalesDia) ?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
       
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-block">
                         <h3></h3>
                        <h3 class="mt-0 header-title"><?= __('Asistencia general del mes ' . $mes) ?></h3>
                        <p class="text-muted m-b-30 font-14">Asistencia general al centro educativo</p>
                        <div class="table-rep-plugin">
                             
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th data-priority="1"><?= $this->Paginator->sort('Faltas totales por mes') ?></th>
                                        <th data-priority="1"><?= $this->Paginator->sort('Cantidad de horas totales ') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            <td><strong><?= $this->Number->format($faltasTotalesMes) ?></strong></td>
                                            <td><strong><?= $this->Number->format($horasTotalesMes) ?></strong></td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            

                        </div>


                    </div>
                </div>
            </div> 
        </div> 
        
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-block">
                        
                        <h3 class="mt-0 header-title"><?= __('Asistencia general') ?></h3>
                        <p class="text-muted m-b-30 font-14">Asistencia general al centro educativo</p>
                        <div class="table-rep-plugin">
                             
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th data-priority="1"><?= $this->Paginator->sort('Faltas totales por mes') ?></th>
                                        <th data-priority="1"><?= $this->Paginator->sort('Cantidad de horas totales ') ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr> 
                                            <td><strong><?= $this->Number->format($faltasTotalesAnual) ?></strong></td>
                                            <td><strong><?= $this->Number->format($horasTotalesAnual) ?></strong></td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    




    </div> 
</div>
 




