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
                        
                        <h3 class="mt-0 header-title"><?= __('Informe Pedagogico de : ' . $alumno->name . " " . $alumno->surname) ?></h3>
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
                                                    <?php  if($evidencias[$i]->status){ ?>
                                                    <td data-priority="1" class="rows alert alert-success">
                                                         <strong>Si</strong>
                                                  </td>
                                                   
                                                    <td data-priority="1" class="rows">No</td>
                                                      <?php  }  else { ?>
                                                          <td data-priority="1" class="rows">
                                                         <strong>Si</strong>
                                                  </td>
                                                
                                                    <td data-priority="1" class="rows alert alert-warning"><strong>No</strong></td>
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
                                            <?php foreach ($derivaciones as $derivacion):?>

                                                <ul>
                                                    <li><?= h($derivacion->derivacion) ?></li>
                                                </ul>

                                             <?php endforeach; ?>

                                                        
                                        </div>
                                         

                                        
                                    </div>

                                    <div class="row">
                                         <div class="col-12">
                                         <p>.............................................................................................</p>
                                        </div>
                                     </div>

                                 <div class="row">
                                    <?php foreach ($observaciones as $observacion ) :?>
                                      <?php if($observacion->titulo =="primer semestre") { ?>
                                         <div class="col-12">

                                            <h5>Observaciones primer semestre</h5>
                                            <p><?= h($observacion->descripcion) ?></p>
                                        </div>

                                     <?php } ?>
                                 
                                    <?php if($observacion->titulo =="segundo semestre") { ?>
                                        <div class="col-12">
                                            <h5>Observaciones segundo semestre</h5>
                                             <p><?= h($observacion->descripcion) ?></p>
                                            
                                        </div>
                                    <?php } ?>

                                     <?php endforeach  ?>
  
                            </div>

                                  
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->
</div> <!-- Page content Wrapper -->




