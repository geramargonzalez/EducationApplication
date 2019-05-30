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
                        
                        <h3 class="mt-0 header-title"><?= __('Informe Pedagogico Nro: ' . $informePedagogico->id) ?></h3>
                        <p class="text-muted m-b-30 font-14">Template.</p>
                        <div class="row">
                           
                               <?php foreach ($evidenciasResultado as $evidenciasResul):
                                ?>
                                    <?php 
                                     $evidenciasResul = $evidenciasResul->toList();

                                    for ($i=0; $i < count($evidenciasResul) ; $i++) { ?>

                                        <div class="col-6">

                                        	<?php 
                                        	
                                        	if($i > 0) { 
                                        	 
	                                        	 if($evidenciasResul[$i]->evidencia->descripcion != $evidenciasResul[$i-1]->evidencia->descripcion) { ?>
	                
	                                        	   <h5> <?= h($evidenciasResul[$i]->evidencia->descripcion) ?></h5>
	                                        		 
	                                        	 <?php } ?>
                                        	
                                        	<?php } else { ?>
                                        	
                                        	   <h5> <?= h($evidenciasResul[$i]->evidencia->descripcion) ?></h5>

                                        	<?php }  ?>
                                        </div>

                                       
                                       
                                        <div class="col-6">
                                        	
                                        	 <p><?= h($evidenciasResul[$i]->descripcion) ?></p>
                             

                                        </div>

                                         <?php if($i == count($evidenciasResul)-1) { ?>
	                                         <div class="col-12">
	                         				   <p>......................................................................................................................................................................................</p>
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
                           		<?php foreach ($derivaciones as $derivacion):?>

                           			<ul>
                           				<li><?= h($derivacion->descripcion) ?></li>
                           			</ul>

                                 <?php endforeach; ?>

                                        	
                            </div>
                             

                            <div class="col-12">

                            	
                            </div>
                           
                           
                                        
                                
                        </div>

                         <div class="row">
                         	 <div class="col-12">
                         	 <p>..........................................................................</p>
                         	</div>
                         </div>

                             <div class="row">
                             <div class="col-12">
                           		<h5>Observaciones primer semestre</h5>
                                      <p>...................................
                                      .....................................
                                  .........................................
                              ..............................................
                           .............................................</p>
                            </div>
                             

                            <div class="col-12">
                            	<h5>Observaciones segundo semestre</h5>
                            	<p>...................................
                                      .....................................
                                  .........................................
                              ..............................................
                           .............................................</p>
                            	
                            </div>
  
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
</div> <!-- Page content Wrapper -->




