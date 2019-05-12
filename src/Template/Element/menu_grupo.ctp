<div class="col-lg-12">
    <div class="card m-b-20">
        <div class="card-block">
            <h4 class="mt-0 header-title">Opciones</h4>
            <p class="text-muted m-b-30 font-14"></p>
                <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administración</button>
                    <div class="dropdown-menu">
                         <?= $this->Html->link(__('Agregar alumnos'), ['controller' => 'Alumnos', 'action' => 'alumnosFromGrupo',$grupo->id],['class' => 'dropdown-item']) ?>
     					<?= $this->Html->link(__('Estadisticas'), ['action' => 'estadisticasGrupo',$grupo->id],['class' => 'dropdown-item']) ?>
                    </div>
                </div>
                <div class="btn-group m-b-10">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pasar Lista</button>
                    <div class="dropdown-menu">
					<?= $this->Html->link(__('Lista'), ['controller' => 'FaltasAlumnos', 'action' => 'faltasAlumnos',$grupo->id],['class' => 'dropdown-item']) ?>
                    <?= $this->Html->link(__('Resumen del dia'), ['controller' => 'FaltasAlumnos', 'action' => 'resumenDelDiaGrupo',$grupo->id],['class' => 'dropdown-item']) ?>
             
                    </div>
                </div>
        </div>
    </div>
</div> 