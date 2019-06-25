<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObservacionesAlumno[]|\Cake\Collection\CollectionInterface $observacionesAlumnos
 */
?> 

<?php echo $this->element('menu_equipo_trabajo'); ?>    

<div class="row">
    <div class="col-md-12">
         <h3 align="center"><?= __('Linea de tiempo de actas de coordinación' ) ?></h3>
    </div>
<div class="col-md-12">
    <section id="cd-timeline" class="cd-container">
        <?php foreach ($observacionesGenerales as $observacionesGeneral): ?>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-danger">
                    <i class="mdi mdi-adjust"></i>
                </div> <!-- cd-timeline-img -->
                <div class="cd-timeline-content"> 
                     
                       <div class="alert alert-info" role="alert">
                              <p><?= $observacionesGeneral->descripcion ?></p>
                              <p><?= $observacionesGeneral->centro->name ?></p>
                        </div>
                        <p>   <?= $this->Html->link(__('Ver'), ['action' => 'view', $observacionesGeneral->id],['class'=>'btn btn-warning btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
            
                    <?php if($user_session['id'] == $observacionesGeneral->id_user){ ?>                                        
                    
                         <?= $this->Html->link(__('Editar'), ['action' => 'edit', $observacionesGeneral->id],['class'=>'btn btn-info btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                    
                     <?php } ?> </p>
                    
                    <span class="cd-date"><?=h("Por " . $observacionesGeneral->user->name . " " . $observacionesGeneral->user->surname)?></span>

                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->
         <?php endforeach; ?>
        
    </section> <!-- cd-timeline -->
</div>
</div><!-- Row -->





