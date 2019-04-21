<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Taller $taller
 */
 use App\Enums\RolesEnum;
?>
<div class="row">
    <div class="col-12">
        
        <div class="card m-b-20">
            <div class="card-block">
                <h3>Perfil</h3>
                <h4 class="mt-0 header-title"><?= __('Materia:' . $taller->name ) ?></h4>
                <?php if($taller->id_user != 0) {?>
                    <p class="text-muted m-b-30 font-14">Docente: <?= h($user->name . " " . $user->surname) ?></p>
                  <?php } else {?>
                    <p class="text-muted m-b-30 font-14"><?= h($user) ?></p>
                  <?php } ?>
                   <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-info">Menu</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <?= $this->Html->link(__('Agregar'),['controller' =>'Alumnos','action' => 'addAlumnosToTaller', $taller->id],['class'=>'dropdown-item']) ?>
                        </div>
                    </div><!-- /btn-group -->
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                        <?= $this->Html->link(__('Ver'), ['controller' => 'Alumnos', 'action' => 'view', $alumno->id]) ?>
                                        <?php if($user_session['id'] == $taller->id_user){ ?>
                                        <?= $this->Form->postLink(__('Quitar'), ['controller' => 'Alumnos', 'action' => 'deleteByAlumno', $alumno->id,$taller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alumno->id)]) ?>
                                          <?php } ?>
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






