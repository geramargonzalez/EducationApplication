  <?php
  use App\Enums\RolesEnum;
?>

<div class="col-lg-12 ">
      <div class="card m-b-20">
          <div class="card-block ">
              <h1  align="center" >Perfil equipo de trabajo</h1>
              <p class="text-muted m-b-30 font-14" align="center">Opciones para los equipos</p>
              <div class="" align="center">
               
                        <div class="btn-group m-b-10">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actas 
                          </button>
                           <div class="dropdown-menu">
                             <?= $this->Html->link(__('Nueva'), ['controller' => 'ObservacionesGenerales', 'action' => 'add'],['class' => 'dropdown-item']) ?>
                             <?= $this->Html->link(__('Ver'), ['controller' => 'ObservacionesGenerales', 'action' => 'index'],['class' => 'dropdown-item']) ?>
                          </div>
                      </div>
                       <div class="btn-group m-b-10">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Centro 
                        </button>
                         <div class="dropdown-menu">
                           <?= $this->Html->link(__('Asistencia'), ['controller' => 'FaltasAlumnos', 'action' => 'elegirCentro'],['class' => 'dropdown-item']) ?>
                        
                      </div>
                  </div>
                 
                  <div class="btn-group m-b-10">
                      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Informe pedagogico 
                      </button>
                       <div class="dropdown-menu">
                         <?= $this->Html->link(__('Nuevo'), ['controller' => 'InformePedagogico', 'action' => 'add'],['class' => 'dropdown-item']) ?>
                         <?= $this->Html->link(__('Todos'), ['controller' => 'InformePedagogico', 'action' => 'index'],['class' => 'dropdown-item']) ?>
                        
                      </div>
                  </div>
                  </div>
              </div>

          </div>
      </div>
  </div> 