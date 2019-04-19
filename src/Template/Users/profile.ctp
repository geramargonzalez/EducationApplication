<div class="panel panel-default">
       <div class="panel-heading resume-heading">
          <div class="row">
                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                    <?= $this->Html->image('../images/users/avatar-1.jpg',['height' => '300px','width' => '300px', 'class' => 'rounded-circle']); ?>
                </div>
                <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12">
                   <ul class="list-group">
                      <li class="list-group-item"><?= h($user->name . " " . $user->surname) ?></li>
                      <li class="list-group-item"><?= h("Materia: " . $taller->name) ?></li>
                      <li class="list-group-item"><p><i class="fa fa-envelope-o"></i><?= h("   " .$user->email) ?></p></li>
                      <li class="list-group-item"><p><i class="fa fa-mortar-board"></i><?= h("  " . $user->role->name) ?></p></li>
                     <li class="list-group-item"><?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?></li>
                   </ul>
                </div>
          </div>
       </div>
       
</div>


