<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformePedagogico $informePedagogico
 */
?>
<div class="page-content-wrapper ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-block">
                         <?= $this->Form->create() ?>
                        <h3 class="mt-0 header-title"><?= __('Informe Pedagogico Nro: ' . $informePedagogico->id) ?></h3>
                        <p class="text-muted m-b-30 font-14">Template.</p>
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

                               <?php foreach ($evidenciasResultado as $evidenciasResul):
                                ?>
                                    <?php 
                                     $evidenciasResul = $evidenciasResul->toList();

                                    for ($i=0; $i < count($evidenciasResul) ; $i++) { ?>

                                        <div class="col-6">

                                        	<?php 
                                        	
                                        	if($i > 0) { 
                                        	 
	                                        	 if($evidenciasResul[$i]->evidencia->descripcion != $evidenciasResul[$i-1]->evidencia->descripcion) { ?>
	                
	                                        	   <h4> <?= h($evidenciasResul[$i]->evidencia->descripcion) ?></h4>
	                                        		 
	                                        	 <?php } ?>
                                        	
                                        	<?php } else { ?>
                                        	
                                        	   <h4> <?= h($evidenciasResul[$i]->evidencia->descripcion) ?></h4>

                                        	<?php }  ?>
                                        </div>

                                        <div class="col-6">
                                            <table class="table table-striped table-bordered evidencia">
                                               <tr>
                                                    <td data-priority="1" class="rows"><?= h($evidenciasResul[$i]->descripcion) ?></td>
                                                    <?php  if($evidenciasResul[$i]->id >= 10){ ?>
                                                    <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" .$evidenciasResul[$i]->id . "_si", ['type'=>'checkbox','label'=>false]); ?></td>
                                                    <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . $evidenciasResul[$i]->id . "_no", ['type'=>'checkbox','label'=>false]); ?></td>
                                                      <?php  }  else { ?>
                                                        <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . "0" .$evidenciasResul[$i]->id . "_si", ['type'=>'checkbox','label'=>false]); ?></td>
                                                    <td data-priority="1" class="rows"><?= $this->Form->control("evidencia_" . "0" . $evidenciasResul[$i]->id . "_no", ['type'=>'checkbox','label'=>false]); ?></td>

                                                      <?php  }  ?>
                                                </tr>                               
                                            </table>
                                        </div>

                                         <?php if($i == count($evidenciasResul)-1) { ?>
	                                         <div class="col-12">
	                         				   <p>..................................................................................................................................................................................................................................................................................</p>
	                         				</div>
                                        	 <?php  } ?>
                                        
                                     <?php  } ?>
                                           
                                <?php endforeach; ?>
                        </div>
                         <div class="row">
                         	 <div class="col-12">
                         	 <p></p>
                         	</div>
                         </div> 
                         <div class="row">
                             <div class="col-12">

                           		<h5>Derivaciones Realizadas</h5>
                                <ul class="form_ul_derivaciones">
                           		<?php foreach ($derivaciones as $derivacion):?>
                           				<li class="li_derivaciones"><?=   $this->Form->control("derivacio_" . $derivacion->id, ['type'=>'checkbox','label'=> $derivacion->descripcion]); ?></li>

                                 <?php endforeach; ?>

                                 </ul>
     	
                            </div>
                             

                            <div class="col-12">
                            </div>        
                                
                        </div>

                         <div class="row">
                         	 <div class="col-12">
                         	 <p>.............................................................................................................................................................................................................................................................................................</p>
                         	</div>
                         </div>

                        <div class="row">
                             <div class="col-12">
                            <div class="m-t-20">
                                    <h6 class="text-muted"><b>Observaciones primer semestre</b></h6>
                                   <?php echo $this->Form->control('observatf_',['class' =>"form-control",'type' => 'textarea','maxlength'=>"255",'label' => false]); ?>
                                </div>
                            </div>
                            <div class="col-12">
                            <div class="m-t-20">
                           <h6 class="text-muted"><b>Observaciones segundo semestre</b></h6>
                           <?php echo $this->Form->control('observats_',['class' =>"form-control",'type' => 'textarea','maxlength'=>"255",'label' => false]); ?>

                            </div>
                            	
                            </div>
  
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




