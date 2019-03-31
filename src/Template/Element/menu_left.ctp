
<?php if($userSession != null) { ?>
	<nav class="large-3 medium-4 columns" id="actions-sidebar">
	    <ul class="side-nav">
	        <li class="heading"><?= __('Actions') ?></li>
	        <li><?= $this->Html->link(__('Alumnos'), ['controller' => 'Alumnos', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('Nuevo Alumno'), ['controller' => 'Alumnos', 'action' => 'add']) ?></li>
	        <li><?= $this->Html->link(__('Agregar Alumno a Taller'), ['controller' => 'Alumnos', 'action' => 'addAlumnoToTaller']) ?></li>
	        <hr/>
	        <li><?= $this->Html->link(__('Materias'), ['controller' => 'Taller', 'action' => 'index']) ?></li>
	        <li><?= $this->Html->link(__('Agregar Materia'), ['controller' => 'Taller', 'action' => 'add']) ?></li>
	        <hr/>
	        <li><?= $this->Html->link(__('Nuevo Profesor'), ['controller' => 'Users', 'action' => 'add']) ?></li>
	        <li><?= $this->Html->link(__('Profesores'), ['controller' => 'Users', 'action' => 'index']) ?></li>
	        <hr/>
	        <li><?= $this->Html->link(__('Agregar Centro'), ['controller' => 'Centro', 'action' => 'add']) ?></li>
	        <li><?= $this->Html->link(__('Centros'), ['controller' => 'Centro', 'action' => 'index']) ?></li>
	    </ul>
	</nav>
<?php } ?>