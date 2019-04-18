  <?php
use App\Enums\RolesEnum;
?>
  <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-block">
                <h4 class="mt-0 header-title">Procesos</h4>
                <p class="text-muted m-b-30 font-14">Administre todo lo que tenga que ver con el alumno</p>
                <div class="">
                     <?php if($user['role_id'] == RolesEnum::PROFESOR || $user['role_id'] == RolesEnum::PROFESOR_ADMIN) { ?>
                    <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proceso</button>
                        <div class="dropdown-menu">
                            <?= $this->Html->link(__('Nuevo'), ['controller' => 'ProcesoAlumnos', 'action' => 'add', $alumno->id],['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link(__('Ver'), ['controller' => 'ProcesoAlumnos', 'action' => 'index', $alumno->id],['class' => 'dropdown-item']) ?>
                        </div>
                    </div>
                    <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Estadisticas</button>
                        <div class="dropdown-menu">
                            <?= $this->Html->link(__('Globales'), ['controller' => 'ProcesoAlumnos', 'action' => 'statsAlumnosGenerales', $alumno->id],['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link(__('Profesor'), ['controller' => 'ProcesoAlumnos', 'action' => 'statsAlumnosGenerales', $alumno->id],['class' => 'dropdown-item']) ?>
                            <?= $this->Html->link(__('Desgloce de rendimientos'),['controller' => 'RendimientoAlumno', 'action' => 'index', $alumno->id],['class' => 'dropdown-item']) ?>
                        </div>
                    </div>
                     <?php } ?>
                    <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Observación</button>
                        <div class="dropdown-menu">
                           <?= $this->Html->link(__('Nueva'), ['controller' => 'ObservacionesAlumnos', 'action' => 'add', $alumno->id],['class' => 'dropdown-item']) ?>
                           <?= $this->Html->link(__('Ver'), ['controller' => 'ObservacionesAlumnos', 'action' => 'index', $alumno->id],['class' => 'dropdown-item']) ?>
                        </div>
                    </div><!-- /btn-group -->
                </div>

            </div>
        </div>

    </div> 