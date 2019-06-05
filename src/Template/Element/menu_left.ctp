<?php
use App\Enums\RolesEnum;
?>
<ul>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account"></i> <span> Alumnos </span> </a>
        <ul class="list-unstyled">
	          <li><?= $this->Html->link(__('Todos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('Nuevo'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
          <li><?= $this->Html->link(__('Pasaje de lista'), ['controller' => 'FaltasAlumnos', 'action' => 'index']) ?></li>
        </ul>
    </li>
      <li class="has_sub">
      <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-minus"></i><span> Deserción </span> </a>
      <ul class="list-unstyled">
         <li><?= $this->Html->link(__('Todas'), ['controller' => 'DesercionAlumnos', 'action' => 'index']) ?>
         <li><?= $this->Html->link(__('Deshabilitar'), ['controller' => 'DesercionAlumnos', 'action' => 'add']) ?>
         <li><?= $this->Html->link(__('Habilitar'), ['controller' => 'DesercionAlumnos', 'action' => 'habilitar']) ?>
      </ul>   
    </li>
    <li class="has_sub">
      <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-group"></i><span> Grupos </span> </a>
      <ul class="list-unstyled">
        
           <li><?= $this->Html->link(__('Todos'), ['controller' => 'Grupo', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('Crear'), ['controller' => 'Grupo', 'action' => 'add']) ?></li>
             <li><?= $this->Html->link(__('Agregar estudiante'), ['controller' => 'Alumnos', 'action' => 'alumnoToGrupo']) ?></li>
            
            
           
      </ul>   
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-steam"></i> <span> Coordinación </span> </a>
        <ul class="list-unstyled">
            <li><?= $this->Html->link(__('Equipo'), ['controller' => 'Taller', 'action' => 'index']) ?></li>
	         <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN | $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
	      
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
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open-variant"></i><span> Evaluaciones </span></a>
            <ul class="list-unstyled">
                <li><?= $this->Html->link(__('Todas'), ['controller' => 'TipoEvaluacion','action' => 'index']) ?></li>
    	        <li><?= $this->Html->link(__('Agregar'), ['controller' => 'TipoEvaluacion','action' => 'add']) ?></li>
            </ul>
        </li>
    <?php } ?>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-home-modern"></i><span> Centro </span></a>
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
               