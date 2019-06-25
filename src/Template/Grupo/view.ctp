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
                                <th data-priority="1"><?= $this->Paginator->sort('Avatar') ?></th>
                                <th scope="col"><?= __('Nombre completo') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alumnos as $alumno): ?>
                                <tr>
                                    <td><?= $alumno->image == "Null" ? $this->Html->image('../images/users/avatar-1.jpg', ['height' => 40,'class' => 'rounded-circle']) : $this->Html->image($alumno->image, ['height' => 40,'class' => 'rounded-circle'])?></td>
                                    <td><?= h($alumno->name . " " . $alumno->surname) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Calificar'), ['controller' => 'ProcesoAlumnos', 'action' => 'add', $alumno->id],['class'=>'btn btn-info btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                        <?= $this->Html->link(__('Observación'), ['controller' => 'ObservacionesAlumnos', 'action' => 'add', $alumno->id],['class'=>'btn btn-success btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                        <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN) { ?>
                                            <?= $this->Html->link(__('Quitar'),['controller'=>'Alumnos','action' => 'deleteByAlumno',$alumno->id, $grupo->id],['class'=>'btn btn-warning btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                     <td></td>
                                    <td>Cantidad de alumnos</td>
                                    <td scope="col"><?= $this->Number->format($cantidad)?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

 




