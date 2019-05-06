<div class="panel panel-default">
       <div class="panel-heading resume-heading">
          <div class="row">
                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">

                    <?= $this->Html->image($user->image,['height' => '300','width' => '300', 'class' => 'rounded-circle']); ?>
                  
                </div>
                <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12">
                   <ul class="list-group">
                      <li class="list-group-item"><?= h($user->name . " " . $user->surname) ?></li>
                      <li class="list-group-item"><?= h("Materia: " . $taller->name) ?></li>
                      <li class="list-group-item"><p><i class="fa fa-envelope-o"></i><?= h("   " .$user->email) ?></p></li>
                      <li class="list-group-item"><p><i class="fa fa-mortar-board"></i><?= h("  " . $user->role->name) ?></p></li>
                     <li class="list-group-item"><?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id]) ?></li>
                      <li class="list-group-item"><?= $this->Html->link(__('Contraseña'), ['action' => 'changePassword']) ?></li>
                   </ul> 
                </div>
          </div>
       </div>
         <div class="table-responsive b-0" data-pattern="priority-columns">
          <P> Tus centros</P>
              <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                      <tr>
                          <th scope="col"><?= $this->Paginator->sort('Centro') ?></th>

                          <th scope="col" class="actions"><?= __('Acciones') ?></th>
                      </tr>
                   </thead>
                  <tbody>
                      <?php foreach ($centros as $centro): ?>
                      <tr>
                          <td><?= h($centro->name) ?></td>
                          <td class="actions">
                              <?= $this->Html->link(__('Ver'), ['controller'=>'Centro','action' => 'view', $centro->id]) ?>
                            
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
        </div>
</div>

