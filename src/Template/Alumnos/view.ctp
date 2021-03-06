
<?php echo $this->element('menu_proceso'); ?>    

<div class="panel panel-default">
       <div class="panel-heading resume-heading">
          <div class="row">
                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12"> 
                    <?= $alumno->image == "Null" ? $this->Html->image('../images/users/avatar-1.jpg', ['height' => '400px','width' => '400px', 'class' => 'rounded-circle']) : $this->Html->image($alumno->image, ['height' => '400px','width' => '400px', 'class' => 'rounded-circle'])
                     ?>
                      <ul class="list-group">
                        <li class="list-group-item"><?= $this->Html->link(__('Editar'), ['action' => 'edit', $alumno->id],['class' => 'btn btn-success']) ?></li>
                      </ul>
                </div>
                <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12">
                   <ul class="list-group">
                      <li class="list-group-item"><?= h($alumno->name . " " . $alumno->surname) ?></li>
                      <li class="list-group-item"><?= h("Procedencia: " .$alumno->procedencia) ?></li>
                      <li class="list-group-item"><p><i class="fa fa-phone"></i><?= h(" " . $alumno->tel) ?></p></li>
                      <li class="list-group-item"><?= $alumno->status == true ? "Estado: Concurriendo" : "Estado: Abandono"; ?></li>
                   </ul>
                   <div class="bs-callout bs-callout-danger">
                       <h4 align="center"><?= __('Antecedentes') ?></h4>
                       <p>
                         <?= $this->Text->autoParagraph(h($alumno->observation)); ?>
                      </p>
                   </div>
                </div>
          </div>
       </div>  
</div>

