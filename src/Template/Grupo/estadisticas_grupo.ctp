 <div class="page-content-wrapper ">
        <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-20">
                                <div class="card-block">
                                    <h3 class="mt-0 header-title">Comprometidos</h3>
                                    <p class="text-muted m-b-30 font-14">Estudiantes que tienen grandes psoibilidades de abandonar o repetir el año</code>.
                                    </p>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th data-priority="1" ><?= $this->Paginator->sort('Nombre completo') ?></th>
                                            <th data-priority="1"><?= $this->Paginator->sort('Promedio') ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             <?php foreach ($alumnoPromedios as $alumnoPromedio): 
                                               foreach ($alumnoPromedio as $alumno): 
                                                ?>

                                                 <?php if($alumno->prom_general < 5 && $alumno->prom_general > 0): ?>
                                        <tr>
                                            <td class="bg-danger"><strong><?= h($alumno->name ." " .$alumno->surname) ?></strong></td>
                                            <td class="bg-danger"><strong><?= $this->Number->format($alumno->prom_general) ?></strong></td>
                                           
                                        </tr>
                                             <?php endif; ?>
                                             <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            
                            </div>
                        
                        </div> <!-- end col --> 

                    </div>
                       <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-20">
                                <div class="card-block">

                                    <h4 class="mt-0 header-title">Riesgo</h4>
                                    <p class="text-muted m-b-30 font-14">Estudiantes que tienen nota de aprobación pero que corren riesgo de estar comprometidos
                                    </p>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th data-priority="1"><?= $this->Paginator->sort('Nombre completo') ?></th>
                                            <th data-priority="1"><?= $this->Paginator->sort('Promedio') ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             <?php foreach ($alumnoPromedios as $alumnoPromedio): 
                                               foreach ($alumnoPromedio as $alumno): 
                                                ?>

                                                 <?php if($alumno->prom_general > 4 && $alumno->prom_general < 8): ?>
                                        <tr>
                                            <td class="bg-warning"><strong><?= h($alumno->name ." " .$alumno->surname) ?></strong></td>
                                            <td class="bg-warning"><strong><?= $this->Number->format($alumno->prom_general) ?></strong></td>
                                           
                                        </tr>
                                             <?php endif; ?>
                                             <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            
                            </div>
                        
                        </div> <!-- end col --> 

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-20">
                                <div class="card-block">

                                    <h4 class="mt-0 header-title">Estables</h4>
                                    <p class="text-muted m-b-30 font-14">Estudiantes que vienen trabajando de forma satisfactoria.
                                    </p>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col"><?= $this->Paginator->sort('Nombre completo') ?></th>
                                            <th dscope="col"><?= $this->Paginator->sort('Promedio') ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                             <?php foreach ($alumnoPromedios as $alumnoPromedio): 
                                               foreach ($alumnoPromedio as $alumno): 
                                                ?>

                                                 <?php if($alumno->prom_general > 7 && $alumno->prom_general < 13): ?>
                                        <tr>
                                            <td class="bg-primary"><strong><?= h($alumno->name ." " .$alumno->surname) ?></strong></td>
                                            <td class="bg-primary"><strong><?= $this->Number->format($alumno->prom_general) ?></strong></td>
                                           
                                        </tr>
                                             <?php endif; ?>
                                             <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            
                            </div>
                        
                        </div> <!-- end col --> 

                    </div>
        </div>

</div>