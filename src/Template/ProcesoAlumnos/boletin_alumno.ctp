<?php echo $this->element('menu_proceso'); ?>    

<div class="row">
      <div class="col-12">
          <div class="card m-b-20">
              <div class="card-block">
                  <h4 class="mt-0 header-title"><?= __('Boletin: ' . $alumno->name ." " . $alumno->surname) ?></h4>
                  <p class="text-muted m-b-30 font-14">
                  </p>
                  <table id="datatable-buttons" class="table table-striped" cellspacing="0" width="100%">

                      <thead>
                      <tr>
                          <th><?= h('Materia') ?></th>
                          <th><?= h('Nota') ?></th>
                          <th><?= h('Valoración') ?></th>
                      </tr>
                      </thead>
                       <tbody>
                            <?php foreach ($alumno_boletines as $alumno_boletin): 
                              foreach ($alumno_boletin as $alumno_bole): ?> 
                          <tr>
                              <td scope="col"><strong><?= h($alumno_bole['materia']) ?></strong></td>
                              <td scope="col"><strong><?= $this->Number->format($alumno_bole['prom_general']) ?></strong></td>
                               <?php if($alumno_bole['prom_general'] <= 5.9){ ?>
                                  <td scope="col" class="rows alert alert-danger"><?= h("Estas comprometiendo tu trabajo en el centro. Debes esforzarte") ?></td>
                              <?php } ?>

                              <?php if($alumno_bole['prom_general'] > 5.9 && $alumno_bole['prom_general'] <= 7.9){ ?>
                                 <td scope="col" class="rows alert alert-warning"><?= h("Buen estudiante, debe seguir esforzandose") ?></td>
                              <?php } ?>
                               
                               <?php if($alumno_bole['prom_general'] >= 8 && $alumno_bole['prom_general'] <= 8.9) { ?>
                                 <td scope="col" class="rows alert alert-success"><?= h("Se ha mostrado activo y capaz en este semestre.") ?></td>
                              <?php } ?>
                               <?php if($alumno_bole['prom_general'] > 8.9 && $alumno_bole['prom_general'] < 10) { ?>
                                 <td  scope="col"class="rows alert alert-success"><?= h("Estudiante que se viene destacando en la materia. Buenas participaciones y actuaciones") ?></td>
                                   <?php } ?>
                                 <?php if($alumno_bole['prom_general'] > 9.9 ) { ?>
                                 <td scope="col" class="rows alert alert-success"><?= h("Actuación destacada") ?></td>
                              <?php } ?>
                          </tr>
                          <?php endforeach; ?>
                          <?php endforeach; ?>
                        <tr >
                            <?php if($promedio_general <= 5.9){ ?>
                              <td class="bg-danger"><p class="text-white"><strong><?= h('PROMEDIO NOTA GENERAL') ?></strong></p></td>
                            <td class="bg-danger"><p class="text-white"><strong><?= $this->Number->format($promedio_general) ?></strong></p></td>
                                 <td scope="col" class="rows alert alert-danger"><?= h("Estas comprometiendo tu trabajo en el centro. Debes esforzarte") ?></td>
                              <?php } ?>
                            <?php if($promedio_general > 5.9 && $promedio_general <= 7.9){ ?>
                            <td class="bg-warning"><p class="text-white"><strong><?= h('PROMEDIO NOTA GENERAL') ?></strong></p></td>
                            <td class="bg-warning"><p class="text-white"><strong><?= $this->Number->format($promedio_general) ?></strong></p></td>
                            <td class="bg-warning"> <p class="text-white"><strong><?= h('Debes esforzarte y comprometerte') ?></strong></p></td>
                            <?php } ?>
                             
                            <?php if($promedio_general >= 8 && $promedio_general <= 8.9) { ?>
                                <td class="bg-primary"><p class="text-white"><strong><?= h('PROMEDIO NOTA GENERAL') ?></strong></p></td>
                               <td class="bg-primary"><p class="text-white"><strong><?= $this->Number->format($promedio_general) ?></strong></p></td>
                               <td class="bg-primary"><p class="text-white"><strong><?= h("Se ha mostrado activo y capaz en este semestre.") ?></strong></td>
                              <?php } ?>
                              
                                <?php if($promedio_general > 8.9 && $promedio_general < 10) { ?>
                                  <td class="bg-success"><p class="text-white"><strong><?= h('PROMEDIO NOTA GENERAL') ?></strong></p></td>
                              <td class="bg-success"><p class="text-white"><strong><?= $this->Number->format($promedio_general) ?></strong></p></td>
                                   <td class="bg-success"><p class="text-white"><strong><?= h("Estudiante que se viene destacando en la materia. Buenas participaciones y actuaciones") ?></strong></p></td>
                                   <?php } ?>
                                   <?php if($promedio_general > 9.9 ) { ?>
                                    <td class="bg-success"><p class="text-white"><strong><?= h('PROMEDIO NOTA GENERAL') ?></strong></p></td>
                              <td class="bg-success"><p class="text-white"><strong><?= $this->Number->format($promedio_general) ?></strong></p></td>
                                <td class="bg-success"><p class="text-white"><strong><?= h("Actuación destacada") ?></strong></td>
                              <?php } ?>
                          </tr>
                          <tr>
                           <?php if($promedio_conducta <= 5.9){ ?>
                             <td class="bg-danger"><p class="text-white"><strong><?= h('PROMEDIO CONDUCTA GENERAL') ?></strong></p></td>
                            <td class="bg-danger"><p class="text-white"><strong><?= $this->Number->format($promedio_conducta) ?></strong></p></td>
                                 <td scope="col" class="rows alert alert-danger"><?= h("Estas comprometiendo tu trabajo en el centro. Debes esforzarte") ?></td>
                            <?php } ?>
                            <?php if($promedio_conducta > 5.9 && $promedio_conducta <= 7.9){ ?>
                            <td class="bg-warning"><p class="text-white"><strong><?= h('PROMEDIO CONDUCTA GENERAL') ?></strong></p></td>
                            <td class="bg-warning"><p class="text-white"><strong><?= $this->Number->format($promedio_conducta) ?></strong></p></td>
                            <td class="bg-warning"> <p class="text-white"><strong><?= h('Debes esforzarte y comprometerte') ?></strong></p></td>
                            <?php } ?>
                            <?php if($promedio_conducta >= 8 && $promedio_conducta <= 8.9) { ?>
                                <td class="bg-primary"><p class="text-white"><strong><?= h('PROMEDIO GENERAL') ?></strong></p></td>
                               <td class="bg-primary"><p class="text-white"><strong><?= $this->Number->format($promedio_conducta) ?></strong></p></td>
                               <td class="bg-primary"><p class="text-white"><strong><?= h("Se ha mostrado activo y capaz en este semestre.") ?></strong></td>
                              <?php } ?>
                                <?php if($promedio_conducta > 8.9 && $promedio_conducta < 10) { ?>
                                  <td class="bg-success"><p class="text-white"><strong><?= h('PROMEDIO GENERAL') ?></strong></p></td>
                              <td class="bg-success"><p class="text-white"><strong><?= $this->Number->format($promedio_conducta) ?></strong></p></td>
                                   <td class="bg-success"><p class="text-white"><strong><?= h("Estudiante que se viene destacando en la materia. Buenas participaciones y actuaciones") ?></strong></p></td>
                                   <?php } ?>
                                   <?php if($promedio_conducta > 9.9 ) { ?>
                                    <td class="bg-success"><p class="text-white"><strong><?= h('PROMEDIO GENERAL') ?></strong></p></td>
                              <td class="bg-success"><p class="text-white"><strong><?= $this->Number->format($promedio_conducta) ?></strong></p></td>
                                <td class="bg-success"><p class="text-white"><strong><?= h("Actuación destacada") ?></strong></td>
                              <?php } ?>
                          </tr>
                           </tbody> 
                           <tfoot></tfoot>
                  </table>
              </div>
          </div>
      </div> <!-- end col -->
  </div> <!-- end row -->
