<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller $taller
 */

use App\Enums\RolesEnum;

?>
<div class="row">
     <?php echo $this->element('menu_grupo'); ?>    
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-block">
                <h3 class="mt-0 header-title"><?= __('Grupo:' . $grupo->name ) ?></h3>
                    <p class="text-muted m-b-30 font-14"> </p>
                         
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                         
                                  <table id="datatable" class="table table-bordered">
                            <thead>
                             <tr>
                                <th scope="col"><?= __('Nombre') ?></th>
                                <th scope="col"><?= __('Apellido') ?></th>
                                <th scope="col"><?= __('Edad') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alumnos as $alumno): ?>
                                <tr>
                                    <td><?= h($alumno->name) ?></td>
                                    <td><?= h($alumno->surname) ?></td>
                                    <td><?= h($alumno->age) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Proceso'), ['controller' => 'Alumnos', 'action' => 'view', $alumno->id],['class'=>'btn btn-info btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                        <?= $this->Html->link(__('Quitar'),['controller'=>'Alumnos','action' => 'deleteByAlumno',$alumno->id, $grupo->id],['class'=>'btn btn-warning btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Cantidad de alumnos</td>
                                    <td scope="col"></td>
                                    <td scope="col"></td>
                                    <td scope="col"><?= $this->Number->format($cantidad)  ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

 




