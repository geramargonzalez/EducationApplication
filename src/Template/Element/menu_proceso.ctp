  <?php
use App\Enums\RolesEnum;
?>
 
  <div class="col-lg-12">
        <div class="card m-b-20">
            <div class="card-block">
                <h4 class="mt-0 header-title">Menu de proceso del estudiante</h4>
                <p class="text-muted m-b-30 font-14">Administre todo lo que tenga que ver con el alumno</p>
                <div class="">
                    <?php if($user_session['role_id'] == RolesEnum::PROFESOR || $user_session['role_id'] == RolesEnum::PROFESOR_ADMIN) { ?>
                        <div class="btn-group m-b-10">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Proceso</button>
                            <div class="dropdown-menu">
                                <?= $this->Html->link(__('Nuevo'), ['controller' => 'ProcesoAlumnos', 'action' => 'add', $alumno->id],['class' => 'dropdown-item']) ?>
                                <?= $this->Html->link(__('Ver'), ['controller' => 'ProcesoAlumnos', 'action' => 'index', $alumno->id],['class' => 'dropdown-item']) ?>
                                 <?= $this->Html->link(__('Desgloce de rendimientos'),['controller' => 'RendimientoAlumno', 'action' => 'index', $alumno->id],['class' => 'dropdown-item']) ?>
                            </div>
                        </div>
                        <div class="btn-group m-b-10">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Graficas</button>
                            <div class="dropdown-menu">
                                 <?= $this->Html->link(__('Mis promedios'), ['controller' => 'ProcesoAlumnos', 'action' => 'statsAlumnos', $alumno->id],['class' => 'dropdown-item']) ?>
                               
                                <?= $this->Html->link(__('Promedio general'), ['controller' => 'ProcesoAlumnos', 'action' => 'statsAlumnosGenerales', $alumno->id],['class' => 'dropdown-item']) ?>

                            </div>
                        </div>
                    <?php } ?>
                    <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Observación</button>
                        <div class="dropdown-menu">
                           <?= $this->Html->link(__('Nueva'), ['controller' => 'ObservacionesAlumnos', 'action' => 'add', $alumno->id],['class' => 'dropdown-item']) ?>
                           <?= $this->Html->link(__('Ver'), ['controller' => 'ObservacionesAlumnos', 'action' => 'index', $alumno->id],['class' => 'dropdown-item']) ?>
                           <?= $this->Html->link(__('Estadisticas'), ['controller' => 'ObservacionesAlumnos', 'action' => 'statsAlumnoObservacion', $alumno->id],['class' => 'dropdown-item']) ?>
                        </div>
                    </div><!-- /btn-group -->
                     <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Asistencias</button>
                        <div class="dropdown-menu">
                           <?= $this->Html->link(__('Diarias'), ['controller' => 'FaltasAlumnos', 'action' => 'faltasPorAlumno', $alumno->id],['class' => 'dropdown-item']) ?>
                           <?= $this->Html->link(__('Estadisticas'), ['controller' => 'FaltasAlumnos', 'action' => 'statsAlumnosFaltasMes', $alumno->id],['class' => 'dropdown-item']) ?>
                        </div>
                    </div>
                     <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Informe Pedagogico</button>
                        <div class="dropdown-menu">
                           <?= $this->Html->link(__('Nuevo'), ['controller' => 'InformePedagogico', 'action' => 'escojerInforme', $alumno->id],['class' => 'dropdown-item']) ?>
                           <?= $this->Html->link(__('Ver'), ['controller' => 'InformePedagogico', 'action' => 'escojerInformeView', $alumno->id],['class' => 'dropdown-item']) ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> 