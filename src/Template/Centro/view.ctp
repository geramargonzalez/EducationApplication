<div class="panel panel-default">
       <div class="panel-heading resume-heading">
          <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                   <ul class="list-group">
                      <li class="list-group-item"><?= h($centro->name) ?></li>
                      <li class="list-group-item"><?= h("Direccion: " .$centro->direccion) ?></li>
                      <li class="list-group-item"><p><i class="fa fa-phone"></i><?= h($centro->tel) ?></p></li>
                   </ul>
                </div>
          </div>
             <div class="card m-b-20">
                        <div class="card-block">
                             <h3></h3>
                            <h4 class="mt-0 header-title"><?= __('Grupos del centro: '.$centro->name) ?></h4>
                            <p class="text-muted m-b-30 font-14">This is an experimental awesome solution for responsive tables with complex data.</p>
                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                         <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                            <?php foreach ($grupos as $grupo): ?>
                                            <tr>
                                                <td><?= h($grupo->name) ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
       </div>
</div>

