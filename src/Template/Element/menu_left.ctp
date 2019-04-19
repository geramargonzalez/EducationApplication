<?php
use App\Enums\RolesEnum;
?>

<?php if($user_session != null) { ?> 
<ul>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Alumnos </span> </a>
        <ul class="list-unstyled">
	          <li><?= $this->Html->link(__('Todos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('Nuevo'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
	          <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN | $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
	        <li><?= $this->Html->link(__('Agregar a taller'), ['controller' => 'Alumnos', 'action' => 'addAlumnoToTaller']) ?></li>
	           <?php } ?>
	        <li><?= $this->Html->link(__('Desercion'), ['controller' => 'DesercionAlumnos', 'action' => 'add']) ?></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cube-outline"></i> <span> Materias </span> </a>
        <ul class="list-unstyled">
            <li><?= $this->Html->link(__('Materias'), ['controller' => 'Taller', 'action' => 'index']) ?></li>
	         <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN | $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
	        <li><?= $this->Html->link(__('Agregar Materia'), ['controller' => 'Taller', 'action' => 'add']) ?></li>
	         <?php } ?>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-album"></i> <span> Profesores </span> </a>
        <ul class="list-unstyled">
            <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN) { ?>
	        <li><?= $this->Html->link(__('Nuevo Profesor'), ['controller' => 'Users', 'action' => 'add']) ?></li>
	        <li><?= $this->Html->link(__('Profesores'), ['controller' => 'Users', 'action' => 'index']) ?></li>
	        <?php } ?>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-clipboard-outline"></i><span> Evaluaciones </span></a>
        <ul class="list-unstyled">
             <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN || $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
	        <li><?= $this->Html->link(__('Agregar evaluacion'), ['controller' => 'TipoEvaluacion','action' => 'add']) ?></li>
	         <li><?= $this->Html->link(__('Tipo de evaluaciones'), ['controller' => 'TipoEvaluacion','action' => 'index']) ?></li>
	        <hr/>
	        <?php } ?>
        </ul>
    </li>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-chart-line"></i><span> Centro </span></a>
        <ul class="list-unstyled">
           <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN || $user_session['role_id'] == RolesEnum::DIRECCION ) { ?>
	        <li><?= $this->Html->link(__('Agregar Centro'), ['controller' => 'Centro', 'action' => 'add']) ?></li>
	        <?php } ?>
	        <?php if($user_session['role_id'] == RolesEnum::PROFESOR_ADMIN || $user_session['role_id'] == RolesEnum::EDUCADOR || $user_session['role_id'] == RolesEnum::PROFESOR) { ?>
	        <li><?= $this->Html->link(__('Agregar centro y turno'), ['controller' => 'Users', 'action' => 'addCentroTurnoUsers']) ?></li>
	          <?php } ?>
	        <li><?= $this->Html->link(__('Centros'), ['controller' => 'Centro', 'action' => 'index']) ?></li>
        </ul>
    </li>
</ul>
<?php } ?>
               