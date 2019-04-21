<div class="page-content-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-block">
                             <h3></h3>
                            <h4 class="mt-0 header-title"><?= __('Docentes logeados') ?></h4>
                            <p class="text-muted m-b-30 font-14">.</p>
                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                         <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre completo') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Rol') ?></th>
                                                <th scope="col" class="actions"><?= __('Acciones') ?></th>
                                            </tr>
                                         </thead>
                                        <tbody>
                                            <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td><?= h($user->name . " " . $user->surname) ?></td>
                                                <td><?= h($user->email) ?></td>
                                                <td><?= h($user->role->name) ?></td>
                                                <td class="actions">
                                                    <?= $this->Html->link(__('View'), ['action' => 'profile', $user->id]) ?>
                                                    <?php if($user_session['role_id'] == 3): ?>
                                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                                    <?php endif; ?> 
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
   </div><!-- container -->
</div> <!-- Page content Wrapper -->


