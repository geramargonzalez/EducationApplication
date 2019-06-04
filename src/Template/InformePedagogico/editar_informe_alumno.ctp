<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformePedagogico $informePedagogico
 */
 //$this->layout ='Pdf/default';
 //$this->layout('pdf_template');  
?>
<div class="page-content-wrapper ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-block">
                         <?= $this->Form->create() ?>
                        <h3 align="center"><?= __('Informe Pedagogico de: ' . $alumno->name . " " . $alumno->surname) ?></h3>
                        <p class="text-muted m-b-30 font-14"><?= __('') ?></p>
                        <div class="row">

                             <div class="col-6">

                             </div>

                              <div class="col-6">
                                <table class="table table-striped table-bordered evidencia">          
                                 <tr>
                                    <th data-priority="1" class="rows"><?= h('EVIDENCIA ') ?></th>
                                    <th data-priority="1" class="rows"><?= h(' SI ') ?></th>
                                    <th data-priority="1" class="rows"><?= h(' NO') ?></th>
                                </tr>
                             </table>

                             </div>            
  
                                    <?php 
                                
                                    for ($i=0; $i < count($evidencias); $i++) { ?>

                                        <div class="col-6">

                                            <?php 
                                            
                                            if($i > 0) { 
                                             
                                                 if($evidencias[$i]->evidencia != $evidencias[$i-1]->evidencia) { ?>
                    
                                                   <h5> <?= h($evidencias[$i]->evidencia) ?></h5>
                                                     
                                                 <?php } ?>
                                            
                                            <?php } else { ?>
                                            
                                               <h5> <?= h($evidencias[$i]->evidencia) ?></h5>

                                            <?php }  ?>
                                        </div>
 
                                        <div class="col-6">
                                             <table class="table table-striped table-bordered evidencia">
                                               <tr>
                                                    <td data-priority="1" class="rows"><?= h($evidencias[$i]->itemDescripcion) ?></td>
                                                   
                                                        
                                                        <?php  if($evidencias[$i]->id_evidencia_resultado >= 10){ ?>
                                                        
                                                               <?php  if($evidencias[$i]->status){ ?>
                                                            
                                                                <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . $evidencias[$i]->id_evidencia_resultado . "_si", ['type'=>'checkbox','label'=>false, 'checked' =>$evidencias[$i]->status ]); ?></td>
                                                                <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . $evidencias[$i]->id_evidencia_resultado . "_no", ['type'=>'checkbox','label'=>false,'checked' =>false]); ?></td>

                                                             <?php  } else { ?>

                                                                 <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . $evidencias[$i]->id_evidencia_resultado . "_si", ['type'=>'checkbox','label'=>false, 'checked' =>$evidencias[$i]->status ]); ?></td>
                                                                <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . $evidencias[$i]->id_evidencia_resultado . "_no", ['type'=>'checkbox','label'=>false,'checked' =>true]); ?></td>

                                                                  <?php  } ?>
                                                              
                                                              <?php  }  else { ?>
                                                                
                                                                
                                                               <?php  if($evidencias[$i]->status){ ?>
                                                            
                                                                <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . $evidencias[$i]->id_evidencia_resultado . "_si", ['type'=>'checkbox','label'=>false, 'checked' =>$evidencias[$i]->status ]); ?></td>
                                                                <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . $evidencias[$i]->id_evidencia_resultado . "_no", ['type'=>'checkbox','label'=>false,'checked' =>false]); ?></td>

                                                             <?php  } else { ?>

                                                                 <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . $evidencias[$i]->id_evidencia_resultado . "_si", ['type'=>'checkbox','label'=>false, 'checked' =>$evidencias[$i]->status ]); ?></td>
                                                                <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . $evidencias[$i]->id_evidencia_resultado . "_no", ['type'=>'checkbox','label'=>false,'checked' =>true]); ?></td>

                                                                  <?php  } ?>
                                                                
                                                              <?php  }  ?>

                                                  
                                                </tr>                               
                                            </table>
                                        </div>
                                         <?php if($i == count($evidencias)-1) { ?>
                                             <div class="col-12">
                                               <p>......................................................................................................................................................................................</p>
                                            </div>
                                             <?php  } ?>
                                        <?php  } ?>
                                 </div>

                            

                               <div class="row">
                                 <div class="col-12">

                                    <h5>Derivaciones Realizadas</h5>
                                    <ul class="form_ul_derivaciones">

                                    <?php  $ok = false ?>
                                    
                                    <?php foreach ($derivaciones_totales as $derivacion_total):?>

                                         <?php foreach ($derivaciones as $derivacion):?>

                                            <?php  if($derivacion->derivacion == $derivacion_total->descripcion){ ?>
                                                    <?php  $ok = true ?>
                                                <?php } ?>
                                            <?php endforeach; ?>

                                                <li class="li_derivaciones"><?=   $this->Form->control("derivacio_" . $derivacion_total->id, ['type'=>'checkbox','label'=> $derivacion_total->descripcion,'checked' => $ok]); ?></li>
                                                <?php  $ok = false ?>

                                     <?php endforeach; ?>

                                    </ul>
            
                                </div>
                     
                                <div class="col-12">
                                </div>        
                                    
                            </div>

                                    <div class="row">
                                         <div class="col-12">
                                         <p>.............................................................................................</p>
                                        </div>
                                     </div>

                            

                                <div class="row">
                                    <?php foreach ($observaciones as $observacion ) :?>
                                        
                                        <?php if($observacion->titulo == "primer semestre") { ?>
                                           <div class="col-12">
                                            <div class="m-t-20">
                                              <h6 class="text-muted"><b>Observaciones primer semestre</b></h6>
                                               <?php echo $this->Form->control('observatf_',['class' =>"form-control",'type' => 'textarea','maxlength'=>"255",'label' => false,'value'=>$observacion->descripcion]); ?>
                                            </div>
                                             </div>

                                     <?php } ?>
                                           
                                   <?php if($observacion->titulo == "segundo semestre") { ?>
                                    <div class="col-12">
                                        <div class="m-t-20">
                                       <h6 class="text-muted"><b>Observaciones segundo semestre</b></h6>
                                       <?php echo $this->Form->control('observats_',['class' =>"form-control",'type' => 'textarea','maxlength'=>"255",'label' => false,'value'=>$observacion->descripcion]); ?>

                                        </div>
                                    </div>
                                     <?php } ?>
                                      <?php endforeach  ?>
                                
                                </div>

                                  <div class="row">
                             
                             <div class="col-12">
                                
                              <?= $this->Form->button(__('Submit'), ['type' => 'submit', 'class' => 'btn btn-primary btn-sm']); ?>
                           
                            </div>
                        </div>

                       <?= $this->Form->end() ?>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
</div> <!-- Page content Wrapper -->




