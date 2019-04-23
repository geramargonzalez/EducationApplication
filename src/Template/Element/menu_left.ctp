<?php
use App\Enums\RolesEnum;
?>
<ul>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Alumnos </span> </a>
        <ul class="list-unstyled">
	          <li><?= $this->Html->link(__('Todos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('Nuevo'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
	          <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN | $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
	        <li><?= $this->Html->link(__('Agregar a materia'), ['controller' => 'Alumnos', 'action' => 'addAlumnoToTaller']) ?></li>
	       <?php } ?>
        </ul>
    </li>
    <li class="has_sub">
              <a href="javascript:void(0);" class="waves-effect"> <span> Deserción/Reinserción </span> </a>
              <ul class="list-unstyled">
                 <li><?= $this->Html->link(__('Todas'), ['controller' => 'DesercionAlumnos', 'action' => 'index']) ?>
                 <li><?= $this->Html->link(__('Deshabilitar'), ['controller' => 'DesercionAlumnos', 'action' => 'add']) ?>
                 <li><?= $this->Html->link(__('Habilitar'), ['controller' => 'DesercionAlumnos', 'action' => 'habilitar']) ?>
              </ul>   
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cube-outline"></i> <span> Materias </span> </a>
        <ul class="list-unstyled">
            <li><?= $this->Html->link(__('Todas'), ['controller' => 'Taller', 'action' => 'index']) ?></li>
	         <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN | $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
	        <li><?= $this->Html->link(__('Agregar'), ['controller' => 'Taller', 'action' => 'add']) ?></li>
	         <?php } ?>
        </ul>
    </li>
    <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN) { ?>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-album"></i> <span> Profesores </span> </a>
        <ul class="list-unstyled">
	        <li><?= $this->Html->link(__('Todos'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Agregar'), ['controller' => 'Users', 'action' => 'add']) ?></li>  
        </ul>
    </li>
    <?php } ?>
    <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN || $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-outline"></i><span> Evaluaciones </span></a>
            <ul class="list-unstyled">
                <li><?= $this->Html->link(__('Todas'), ['controller' => 'TipoEvaluacion','action' => 'index']) ?></li>
    	        <li><?= $this->Html->link(__('Agregar'), ['controller' => 'TipoEvaluacion','action' => 'add']) ?></li>
            </ul>
        </li>
    <?php } ?>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-line"></i><span> Centro </span></a>
        <ul class="list-unstyled">
	        <li><?= $this->Html->link(__('Todos'), ['controller' => 'Centro', 'action' => 'index']) ?></li>
            <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN || $user_session['role_id'] == RolesEnum::DIRECCION ) { ?>
            <li><?= $this->Html->link(__('Agregar'), ['controller' => 'Centro', 'action' => 'add']) ?></li>
            <?php } ?>
            <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN || $user_session['role_id'] == RolesEnum::EDUCADOR || $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
            <li><?= $this->Html->link(__('Agregar Profesor'), ['controller' => 'Users', 'action' => 'addCentroTurnoUsers']) ?></li>
            <?php } ?>
        </ul>
    </li>
</ul>
               