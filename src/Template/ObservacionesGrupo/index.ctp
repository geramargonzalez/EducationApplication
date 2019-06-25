

<?php echo $this->element('menu_grupo'); ?>    

<div class="row">
<div class="col-md-12">
     <h3 align="center"><?= __('Todos los diagnosticos creados por los docentes.') ?></h3>
    <section id="cd-timeline" class="cd-container">
        <?php foreach ($observacionesGrupos as $observacionesGrupo): ?>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-danger">
                    <i class="mdi mdi-adjust"></i>
                </div> <!-- cd-timeline-img -->
                <div class="cd-timeline-content">
                     
              
                       <div class="alert alert-success" role="alert">
                               <p><strong><?= $observacionesGrupo->descripcion ?></strong></p>
                               <p><strong>Doc. <?= $observacionesGrupo->user->name . " " . $observacionesGrupo->user->surname ?></strong></p>
                              >
                        </div>

                      <p><?= $this->Html->link(__('Ver detalle'),['action' => 'view', $observacionesGrupo->id, $grupo->id],['class'=>'btn btn-primary btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                     <?php if($user_session['id'] == $observacionesGrupo->id_user){ ?>    
                        <?= $this->Html->link(__('Editar'),['action' => 'edit', $observacionesGrupo->id, $grupo->id],['class'=>'btn btn-warning btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                        <?= $this->Html->link(__('Delete'),['action' => 'delete', $observacionesGrupo->id],['class'=>'btn btn-info btn-rounded waves-effect waves-light m-t-5','type' => 'button']) ?>
                         <?php } ?>    
                    </p>
                    <span class="cd-date"><?= h($observacionesGrupo->created->day ."/ " .$observacionesGrupo->created->month )?></span>


                </div> <!-- cd-timeline-content -->
                </div> <!-- cd-timeline-block -->
         <?php endforeach; ?>
        
    </section> <!-- cd-timeline -->
</div>
</div><!-- Row -->
</div>
</div>
</div> <!-- end col -->
</div> <!-- end row -->
