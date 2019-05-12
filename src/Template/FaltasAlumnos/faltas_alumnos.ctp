<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TallerAlumno $tallerAlumno
 */
?>
<div class="page-content-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-12"> 
                    <div class="card m-b-20">
                        <?= $this->Form->create() ?>
                        <div class="card-block">
                             <h3></h3>
                            <h4 class="mt-0 header-title"><?= __('Pasar la lista del ' . $grupo->name) ?></h4>
                            <p class="text-muted m-b-30 font-14">This is an experimental awesome solution for responsive tables with complex data.</p>
                            <div class="table-rep-plugin">
                                <div class="table-responsive b-0" data-pattern="priority-columns">
                                   
                                  <table  class="table table-bordered">
                                       <thead>
                                            <tr>
                                                <th><?= __('Nombre') ?></th>
                                                <th><?= __('Faltas') ?></th>
                                            </tr>
                                         </thead> 
                                    <tbody>
                                        <?php foreach ($alumnos as $alumno): ?>
                                            <tr>
                                                <td class="col-sm-9"><?= h($alumno->name . " " . $alumno->surname) ?></td>
                                                <td class="col-sm-3">
                                                       <?php echo $this->Form->control($alumno->id,['class' => 'form-control','label' => false,'value' => 0,'id' => $alumno->id]); ?>
                                                </td>                            
                                            </tr>
                                        <?php endforeach; ?>                 
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                              <?= $this->Form->button(__('Submit')) ?>
                            <?= $this->Form->end() ?>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->
        
    </div> <!-- Page content Wrapper -->




