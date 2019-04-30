<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProcesoAlumno $procesoAlumno
 */
?>

<?php echo $this->element('menu_proceso'); ?>    

<div class="row"> 
    <div class="col-12">
        <div class="card m-b-20">  
            <div class="card-block"> 
                 <?= $this->Form->create($procesoAlumno) ?>
                <h4 class="mt-0 header-title"><?= __('Proceso diario: ' . $alumno->name . " " . $alumno->surname) ?></h4>
                <p class="text-muted m-b-30 font-14">lorep ipsum lorep ipsum lorep ipsum</p>
               
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Conducta</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('conducta',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                
                 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tipo de evaluacion</label>
                    <div class="col-sm-10">
                        
                         <?= $this->Form->control('tipoevaluacion', ['label' => false, 'class' => 'form-control', 'options' => $tipoEvaluacion]); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Rendimiento</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('rendimiento',['class' => 'form-control','label' => false]); ?>
                    </div>
                </div>
                  <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Expresion Oral</label>
                    <div class="col-sm-10">
                        <?php echo $this->Form->control('expresion_oral',['class' => 'form-control','label' => false]); ?>
                    </div>
                  </div>
               
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary btn-sm']) ?>
               <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- end col -->



    <div class="col-12">

        <div class="card m-b-20">
                <div class="card-block">

                    <h4 class="mt-0 header-title">Conducta</h4>
                    <p class="text-muted m-b-30 font-14">
                        La siguiente tabla sirve como guia 
                    </p>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                           <td>Evidencias</td>
                           <td>Concepto</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>1 - 3</th>
                            <td>No logra tener una actitud correcta en clase</td>
                            <td>Distoriciona constantemente</td>
                            <td>Agrede constantemente</td>
                            <td>No responde a los llamos de atencion de los docentes</td>

                        </tr>
                        <tr>
                            <th>4 - 5</th>
                            <td>Oscila entre actitudes hostiles y actitudes acordes a la clase</td>
                            <td>Responde correctamente a los llamados de atencion</td>
                            <td>Molesta pero trabaja</td>
                            
                        </tr>
                         <tr>
                            <th>6 - 7</th>
                            <td>Trabaja aceptablemente</td>
                            <td>No tiene un buen nivel pero es responsable</td>
                            <td>Participa en clase</td>
                        </tr>
                         <tr>
                            <th>8-10</th>
                            <td>Trabaja siempre </td>
                            <td>Es buen compañero/a</td>
                            <td>Coopera y ayuda a los demas</td>
                            <td>Promueve los buenos vinculos</td>
                        </tr>
                         <tr>
                            <th>11-12</th>
                            <td>Excelencia</td>
                        </tr>

                        
                        </tbody>
                    </table>

                </div>
                </div>

        <div class="card m-b-20">
                        <div class="card-block">

                            <h4 class="mt-0 header-title">Rendimiento</h4>
                            <p class="text-muted m-b-30 font-14">
                                 La siguiente tabla sirve como guia 
                            </p>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                   <td>Evidencias</td>
                                   <td>Concepto</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>1 - 3</th>
                                    <td>Problemas serios en la escritura y lectura</td>
                                    <td>Problemas serios de compresion de la tarea</td>
                                    <td>No realiza la tarea</td>
                                  
                                </tr>
                                <tr>
                                    <th>4 - 5</th>
                                    <td>Se esfuerza pero no logra una escrutra de nivel basico</td>
                                    <td>Responde a medias</td>
                                    <td>Comprende la tarea pero no logra responder de fomra completa</td>
                                </tr>
                                 <tr>
                                     <th>6 - 7</th>
                                    <td>Responde adecuadamente pero acotado</td>
                                    <td>Aplica conocimiento adquirido en clase.</td>
                                    <td>Tiene buen nivel de abstaracción y reflexión en sus respuestas</td>
                                </tr>
                                <tr>
                                    <th>9 - 12</th>
                                    <td>Reflexivo o lógico </td>
                                    <td>Participa, trabaja en equipo </td>
                                    <td>Utiliza buenos argumentos, resuelve problemas</td>
                                </tr>

                                
                                </tbody>
                            </table>

                        </div>
         </div>

             <div class="card m-b-20">
                        <div class="card-block">

                            <h4 class="mt-0 header-title">Expresion Oral</h4>
                            <p class="text-muted m-b-30 font-14">
                                 La siguiente tabla sirve como guia 
                            </p>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                   <td>Evidencias</td>
                                   <td>Concepto</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>1 - 3</th>
                                    <td>No participa oralmente nunca o casi nunca</td>
                                    <td>Es timido</td>
                                    <td>Cuando participa no logra responder adecuadamente.</td>
                                </tr>
                                <tr>
                                    <th>4 - 5</th>
                                    <td>Expone sus ideas de forma confusa</td>
                                    <td>Cuando participa no logra responder adecuadamente</td>
                                    
                                </tr>
                                 <tr>
                                    <th>6 - 7</th>
                                    <td>Participa adecuadamente </td>
                                    <td>Interviene a menudo</td>
                                    <td>Se expresa con coherencia y buen lenguaje</td>
                                </tr>
                                <tr>
                                    <th>8-10</th>
                                    <td>Reflexivo</td>
                                    <td>Participa</td>
                                    <td>Utiliza buenos argumentos</td>
                                </tr>
                                 <tr>
                                    <th>11-12</th>
                                    <td>Excelencia</td>
                                </tr>

                                
                                </tbody>
                            </table>

                        </div>
                </div>

            
    

</div> <!-- end row -->