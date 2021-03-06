<?php
use App\Enums\RolesEnum;
?>
<div class="col-lg-12 ">
      <div class="card m-b-20">
          <div class="card-block">
            <h1 align="center" >Grupo <?= h($grupo->name) ?></h1>
            <p class="text-muted m-b-30 font-14" align="center">Opciones para evaluar los grupos de trabajo</p>
            <div  align="center">
                <div class="btn-group m-b-10" >
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administración</button>
                    <div class="dropdown-menu">
                         <?= $this->Html->link(__('Agregar alumnos'), ['controller' => 'Alumnos', 'action' => 'alumnosFromGrupo',$grupo->id],['class' => 'dropdown-item']) ?>
                         <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN | $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
                        <?= $this->Html->link(__('Estadisticas'), ['action' => 'estadisticasGrupo', $grupo->id],['class' => 'dropdown-item']) ?>
                         <?php } ?>
                    </div>
                </div>
                  <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Diagnostico Grupal</button>
                    <div class="dropdown-menu">
                           <?= $this->Html->link(__('Nuevo'), ['controller' => 'ObservacionesGrupo','action' => 'add', $grupo->id],['class' => 'dropdown-item']) ?>
                         <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN | $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
                        <?= $this->Html->link(__('Todos'), ['controller' => 'ObservacionesGrupo','action' => 'index', $grupo->id],['class' => 'dropdown-item']) ?>
                         <?php } ?>
                    </div>
                </div>
                <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Asistencia</button>
                    <div class="dropdown-menu">
                    <?= $this->Html->link(__('Pasaje de lista'), ['controller' => 'FaltasAlumnos', 'action' => 'faltasAlumnos',$grupo->id],['class' => 'dropdown-item']) ?>
                    <?= $this->Html->link(__('Resumen del dia'), ['controller' => 'FaltasAlumnos', 'action' => 'resumenDelDiaGrupo',$grupo->id],['class' => 'dropdown-item']) ?>
                     <?= $this->Html->link(__('Asistencia general'), ['controller' => 'FaltasAlumnos', 'action' => 'resumenDelDiaGrupo',$grupo->id],['class' => 'dropdown-item']) ?>
                    </div>
                 </div>
            </div>
          </div>
        </div>
    </div>

 