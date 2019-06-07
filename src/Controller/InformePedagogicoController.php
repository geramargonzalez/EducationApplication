<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InformePedagogico Controller
 *
 *
 * @method \App\Model\Entity\InformePedagogico[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformePedagogicoController extends AppController
{


        public function initialize()
    {
        parent::initialize();
        $this->loadModel('Turno');
        $this->loadModel('Centro');
        $this->loadModel('Alumnos');
        $this->loadModel('UsersCentro');
        $this->loadModel('Evidencias');
        $this->loadModel('EvidenciasResultado');
        $this->loadModel('Derivaciones');
        $this->loadModel('InformeAlumno');
        $this->loadModel('EvidenciaResultadoAlumno'); 
        $this->loadModel('DerivacionesAlumnos');
        $this->loadModel('ObservacionesInforme');
        $this->loadComponent('RequestHandler');
       
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //$informePedagogico = $this->paginate($this->InformePedagogico);
         $user = $this->Auth->user();

          $subquery = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);

        $subquery2 = $this->UsersCentro->find()
                                       ->select(['UsersCentro.id_turno'])
                                       ->where(['UsersCentro.id_user =' => $user['id']]);

        $query = $this->InformePedagogico->find()
                        ->where(['status =' => true])
                        ->andWhere([
                            'InformePedagogico.id_centro  IN' => $subquery])
                              ->andWhere([
                            'InformePedagogico.id_turno IN' => $subquery2]);

        $informePedagogico = $this->paginate($query,['limit' => 100]);      
        $this->set(compact('informePedagogico'));
    }
 
        /** 
         * View method
         *
         * @param string|null $id Informe Pedagogico id.
         * @return \Cake\Http\Response|void
         * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
         */
        public function view($id = null)
        {
            $informePedagogico = $this->InformePedagogico->get($id);
            $evidencias = $this->Evidencias->find('all')->where(['Evidencias.id_informe ='=>$id]);
            $evidenciasResultado = array();
            foreach ($evidencias as $evidencia) {
                $evidenciasResultado[] = $this->EvidenciasResultado->find('all',['contain'=>['Evidencias']])->where(['EvidenciasResultado.id_evidencia ='=> $evidencia->id]);
            }

            $derivaciones = $this->Derivaciones->find('all');
            $this->set(compact('informePedagogico','evidencias','evidenciasResultado','derivaciones'));
           
        }

         public function pdfInformeAlumno($id_informe = null,$id_alumno = null){

            // Buscar el ultimo informe de ese alumno
            $alumno = $this->Alumnos->get($id_alumno);
            $informePedagogico = $this->InformePedagogico->get($id_informe);
            
            $evidencias_query = $this->EvidenciaResultadoAlumno->find()->where(['EvidenciaResultadoAlumno.id_alumno' => $alumno->id])
                                        ->join([
                                            'table' => 'evidencias_resultado',
                                            'alias' => 'ev',
                                            'type' => 'right',
                                            "conditions" => "ev.id = EvidenciaResultadoAlumno.id_evidencia_resultado"
                                         ])->join([
                                            'table' => 'evidencias',
                                            'alias' => 'evi',
                                            'type' => 'left',
                                            "conditions" => "evi.id = ev.id_evidencia"
                                         ])
                                          ->select([
                                                 'itemDescripcion' => "ev.descripcion",
                                                 'status' => "EvidenciaResultadoAlumno.status",
                                                 'evidencia' => "evi.descripcion"
                                            ]);   
              $evidencias = $evidencias_query->toList();
              $derivaciones_query = $this->DerivacionesAlumnos->find()->where(['DerivacionesAlumnos.id_alumno' => $alumno->id])
                                        ->join([
                                            'table' => 'derivaciones',
                                            'alias' => 'de',
                                            'type' => 'right',
                                            "conditions" => "de.id = DerivacionesAlumnos.id_derivacion"
                                         ])
                                          ->select([
                                                 'derivacion' => "de.descripcion"
                                            ]);   
               $derivaciones = $derivaciones_query->toList();
               $obs_query = $this->ObservacionesInforme->find('all')->where(['ObservacionesInforme.id_alumno ='=>$alumno->id]);
               $observaciones = $obs_query->toList();

               $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => 'InformePedagogico_' . $alumno->name ."_". $alumno->surname . '.pdf'
                ]
            ]);


               $this->set(compact('evidencias','derivaciones','observaciones','alumno','informePedagogico'));
           
        }

          public function escojerInforme($id_alumno = null)
        {
            $informes = $this->InformePedagogico->find('list',['keyField' => 'id','valueField' => 'titulo']);
            $tieneInforme = $this->InformePedagogico->find("all")->where(['InformeAlumno.id_alumno =' => $alumno->id]);
            
            if ($this->request->is('post')) {
                 $data = $this->request->getData();
                 return $this->redirect(['action' => 'informeAlumno', $data['informes'],$id_alumno]);
                } 

            if(count($informes) < 1){
                  return $this->redirect(['controller' => 'Alumnos','action' => 'view',$id_alumno]);
            } 
            $this->set(compact('informes'));   
        }

            public function escojerInformeEdiccion($id_alumno = null)
        {
            $informes = $this->InformePedagogico->find('list',['keyField' => 'id','valueField' => 'titulo']);
            if ($this->request->is('post')) {
                 $data = $this->request->getData();
                 return $this->redirect(['action' => 'editarInformeAlumno', $data['informes'],$id_alumno]);
                }   
            $this->set(compact('informes'));   
        }
       

        public function informeAlumno($id_informe = null, $id_alumno = null)
        {
            $informePedagogico = $this->InformePedagogico->get($id_informe);
            $alumno = $this->Alumnos->get($id_alumno);
            $evidencias = $this->Evidencias->find('all')->where(['Evidencias.id_informe ='=>$informePedagogico->id]);
            $evidenciasResultado = array();
           
            foreach ($evidencias as $evidencia) {
                $evidenciasResultado[] = $this->EvidenciasResultado->find('all',['contain'=>['Evidencias']])->where(['EvidenciasResultado.id_evidencia ='=> $evidencia->id]);
            }
            $derivaciones = $this->Derivaciones->find('all');

            if ($this->request->is('post')) {
                
                $tieneInforme = $this->InformeAlumno->find("all")->where(['InformeAlumno.id_alumno =' => $alumno->id]);
                $tieneInforme->enableHydration(false);
                $tieneInforme = $tieneInforme->toList(); 
                
                $data = $this->request->getData();

                if(count($tieneInforme) < 1) {

                    $informeAlumno = $this->InformeAlumno->newEntity();
                    $contador = 0;
                        $datos  =  array(
                            'id_informe' => $informePedagogico->id,
                            "id_alumno" => $alumno->id
                        );
                        $informeAlumno = $this->InformeAlumno->patchEntity($informeAlumno,$datos);

                    if ($this->InformeAlumno->save($informeAlumno)) {

                        foreach ($data as $key => $value) {

                            $rest = substr($key, 0, 10);

                                if('evidencia_' == $rest){
                                      
                                      $evidencia_final = substr($key, 12, 13);
                                      $id_evidencia = substr($key, 10, -3);
                                      $evidenciaResultadoAlumno = $this->EvidenciaResultadoAlumno->newEntity();
                                      
                                        if($evidencia_final == '_si'){

                                            if($value == 1){

                                                $datosEvi  =  array(
                                                    'id_evidencia_resultado' => $id_evidencia,
                                                    "id_alumno" => $alumno->id,
                                                    'status' => true
                                                );
                                            }

                                        } // end evidencia final si

                                       if($evidencia_final == '_no'){

                                         if($value == 1){
                                              
                                            $datosEvi  =  array(
                                                    'id_evidencia_resultado' => $id_evidencia,
                                                    "id_alumno" => $alumno->id,
                                                    'status' => false
                                                );
                                         }
                                         $evidenciaResultadoAlumno = $this->EvidenciaResultadoAlumno->patchEntity($evidenciaResultadoAlumno,$datosEvi);
                                         $this->EvidenciaResultadoAlumno->save($evidenciaResultadoAlumno);

                                      } // end evidencia final no
                                       
                                } // end general  
                                $rest = substr($key, 0, 10);
                                if("derivacio_" == $rest){
                                      $deri_id = substr($key, -1, 1);
                                      $derivacionAlumno = $this->DerivacionesAlumnos->newEntity();
                                      if($value == 1){
                                          $datosDeri  =  array(
                                                     "id_derivacion" =>  $deri_id,
                                                    "id_alumno" => $alumno->id
                                                );
                                           $derivacionAlumno  = $this->DerivacionesAlumnos->patchEntity($derivacionAlumno,$datosDeri);
                                    $this->DerivacionesAlumnos->save($derivacionAlumno);
                                  }
                                } // end derivaciones
                                $rest = substr($key, 0, 10);
                                if("observatf_" == $rest){
                                       $observacionesInformef = $this->ObservacionesInforme->newEntity();
                                        $datos_obs  =  array(
                                                     'id_informe' => $informePedagogico->id,
                                                     "id_alumno" => $alumno->id,
                                                     "titulo" => "primer semestre",
                                                     "descripcion" => $value
                                                );
                                    $observacionesInformef  = $this->ObservacionesInforme->patchEntity($observacionesInformef,$datos_obs);
                                    $this->ObservacionesInforme->save($observacionesInformef);
                                }
                                if("observats_" == $rest){
                                      
                                        $observacionesInformes = $this->ObservacionesInforme->newEntity();
                                        $datos_obs  =  array(
                                                     'id_informe' => $informePedagogico->id,
                                                     "id_alumno" => $alumno->id,
                                                     "titulo" => "segundo semestre",
                                                     "descripcion" => $value
                                                );
                                        $observacionesInformes  = $this->ObservacionesInforme->patchEntity($observacionesInformes,$datos_obs);
                                      $this->ObservacionesInforme->save($observacionesInformes);

                                } // end obser s
                            } // end foreach

                        $this->Flash->success(__('Se creo un informe pedagogico para ' . " " . $alumno->name ." " . $alumno->surname));
                        return $this->redirect(['action' => 'verInformeAlumno', $informePedagogico->id,$alumno->id]);

                       } // end save informe alumno
                    
                    } else {
                        $this->Flash->error(__('El usuario ya tiene informe pedagogico.'));
                     }
                 }     
            
            $this->set(compact('informePedagogico','evidencias','evidenciasResultado','derivaciones'));
        }


        public function editarInformeAlumno($id_informe = null, $id_alumno = null)
        {
            $informePedagogico = $this->InformePedagogico->get($id_informe);
               $alumno = $this->Alumnos->get($id_alumno);
            $evidencias_query = $this->EvidenciaResultadoAlumno->find()->where(['EvidenciaResultadoAlumno.id_alumno' => $alumno->id])
                                        ->join([
                                            'table' => 'evidencias_resultado',
                                            'alias' => 'ev',
                                            'type' => 'right',
                                            "conditions" => "ev.id = EvidenciaResultadoAlumno.id_evidencia_resultado"
                                         ])->join([
                                            'table' => 'evidencias',
                                            'alias' => 'evi',
                                            'type' => 'left',
                                            "conditions" => "evi.id = ev.id_evidencia"
                                         ])
                                          ->select([
                                                 'itemDescripcion' => "ev.descripcion",
                                                 'id_evidencia_resultado' => "ev.id",
                                                 'status' => "EvidenciaResultadoAlumno.status",
                                                 'evidencia' => "evi.descripcion",
                                                 'id_resultado_alumno' => "EvidenciaResultadoAlumno.id",
                                            ]);   
              $evidencias = $evidencias_query->toList();
              $derivaciones_query = $this->DerivacionesAlumnos->find()->where(['DerivacionesAlumnos.id_alumno' => $alumno->id])
                                        ->join([
                                            'table' => 'derivaciones',
                                            'alias' => 'de',
                                            'type' => 'left',
                                            "conditions" => "de.id = DerivacionesAlumnos.id_derivacion"
                                         ])
                                          ->select([
                                                 'derivacion' => "de.descripcion",
                                                 'id_derivacion' => "de.id"
                                            ]);   
               $derivaciones = $derivaciones_query->toList();
               $obs_query = $this->ObservacionesInforme->find('all')->where(['ObservacionesInforme.id_alumno ='=>$alumno->id]);
               $observaciones = $obs_query->toList();
               $derivaciones_totales = $this->Derivaciones->find('all');
            

            if ($this->request->is('post')) {
                
                    $data = $this->request->getData();
                    $informeAlumno = $this->InformeAlumno->find('all')->where(['InformeAlumno.id_alumno =' => $alumno->id]);
                    $informeAlumno = $informeAlumno->first();


                    //debug($data);
                   // exit;

                        foreach ($data as $key => $value) {

                            $rest = substr($key, 0, 10);

                                if('evidencia_' == $rest){
                                      
                                     // $evidencia_final = substr($key, 12, 13);
                                      $id_evi_alumno = substr($key, 10, -3);
                                       //$evidenciaResultadoAlumno = $this->EvidenciaResultadoAlumno->newEntity();
                                         $evidenciaResultadoAlumno = $this->EvidenciaResultadoAlumno->get($id_evi_alumno);
                                        
                                            if($value == 1){

                                                 $evidenciaResultadoAlumno->status = true;

                                            } else {

                                                  $evidenciaResultadoAlumno->status = false;
                                            }
                                        

                                         $this->EvidenciaResultadoAlumno->save($evidenciaResultadoAlumno);
                                      // end evidencia final no   
                                } // end general  
                                
                                $rest = substr($key, 0, 10);
                                
                                if("derivacio_" == $rest){
                                      
                                      $deri_id = substr($key, -1, 1);
                                       // $derivacionAlumno = $this->DerivacionesAlumnos->newEntity();
                                         $derivacionAlumno = $this->DerivacionesAlumnos->find('all')->where(['DerivacionesAlumnos.id_derivacion =' =>$deri_id]);
                                          //$derivacionAlumnos = $derivacionAlumno->first();
                                          //$derivacionAlumno->enableHydration(false);
                                          $derivacionAlumno = $derivacionAlumno->first(); 

                                        
                                        if($value == 1 && $derivacionAlumno == null){

                                         $derivacionAlumno = $this->DerivacionesAlumnos->newEntity();

                                          $datosDeri  =  array(
                                                     "id_derivacion" =>  $deri_id,
                                                    "id_alumno" => $alumno->id
                                                );
                                           $derivacionAlumno  = $this->DerivacionesAlumnos->patchEntity($derivacionAlumno,$datosDeri);

                                            // debug($derivacionAlumno);
                                           //debug($value);

                                         // exit;
                                        
                                            $this->DerivacionesAlumnos->save($derivacionAlumno);

                                       }

                                         if($value == 0 && $derivacionAlumno != null){

                                            $this->DerivacionesAlumnos->delete($derivacionAlumno);

                                       }

                                  }

                               
                                $rest = substr($key, 0, 10);
                                if("observatf_" == $rest){
                                       //$observacionesInformef = $this->ObservacionesInforme->newEntity();
                                       $observacionesInformef = $this->ObservacionesInforme->find('all')->where(['ObservacionesInforme.id_alumno =' => $alumno->id])->andWhere(['titulo =' => "primer semestre"]);
                                          $observacionesInformef = $observacionesInformef->first();
                                          $observacionesInformef->descripcion = $value;
                                          $this->ObservacionesInforme->save($observacionesInformef);
                                } // end obser s

                                if("observats_" == $rest){
                                      
                                    $observacionesInformes = $this->ObservacionesInforme->find('all')->where(['ObservacionesInforme.id_alumno =' =>$alumno->id])->andWhere(['titulo =' => "segundo semestre"]);
                                        $observacionesInformes = $observacionesInformes->first();

                                        $observacionesInformes->descripcion = $value;

                                      $this->ObservacionesInforme->save($observacionesInformes);

                                } // end obser s
                           
                            }// end foreach

                    $this->Flash->success(__('Se edito el informe para ' . " " . $alumno->name . " " . $alumno->surname));
                    return $this->redirect(['action' => 'verInformeAlumno', $informePedagogico->id,$alumno->id]);
                 }   

            $this->set(compact('evidencias','derivaciones','derivaciones_totales','observaciones','alumno','informePedagogico'));
           
        }



        public function verInformeAlumno( $id_informe = null,$id_alumno = null){

            // Buscar el ultimo informe de ese alumno
                $alumno = $this->Alumnos->get($id_alumno);
                $tieneInforme = $this->InformeAlumno->find("all")->where(['InformeAlumno.id_alumno =' => $alumno->id]);
                $tieneInforme->enableHydration(false);
                $tieneInforme = $tieneInforme->toList(); 
            

            if(count($tieneInforme) > 0) {
        
         
            $informePedagogico = $this->InformePedagogico->get($id_informe);
            
            $evidencias_query = $this->EvidenciaResultadoAlumno->find()->where(['EvidenciaResultadoAlumno.id_alumno' => $alumno->id])
                                        ->join([
                                            'table' => 'evidencias_resultado',
                                            'alias' => 'ev',
                                            'type' => 'right',
                                            "conditions" => "ev.id = EvidenciaResultadoAlumno.id_evidencia_resultado"
                                         ])->join([
                                            'table' => 'evidencias',
                                            'alias' => 'evi',
                                            'type' => 'left',
                                            "conditions" => "evi.id = ev.id_evidencia"
                                         ])
                                          ->select([
                                                 'itemDescripcion' => "ev.descripcion",
                                                 'status' => "EvidenciaResultadoAlumno.status",
                                                 'evidencia' => "evi.descripcion"
                                            ]);   
              $evidencias = $evidencias_query->toList();
              $derivaciones_query = $this->DerivacionesAlumnos->find()->where(['DerivacionesAlumnos.id_alumno' => $alumno->id])
                                        ->join([
                                            'table' => 'derivaciones',
                                            'alias' => 'de',
                                            'type' => 'right',
                                            "conditions" => "de.id = DerivacionesAlumnos.id_derivacion"
                                         ])
                                          ->select([
                                                 'derivacion' => "de.descripcion"
                                            ]);   
               $derivaciones = $derivaciones_query->toList();
               $obs_query = $this->ObservacionesInforme->find('all')->where(['ObservacionesInforme.id_alumno ='=>$alumno->id]);
               $observaciones = $obs_query->toList();
               
               $this->set(compact('evidencias','derivaciones','observaciones','alumno','informePedagogico'));

           } else {

              $this->Flash->error(__('No existen informes para este alumno.'));
             return $this->redirect(['controller' => 'Alumnos','action' => 'view',$id_alumno]);
           }
        }

            public function escojerInformeView($id_alumno = null)
        {
           
            $query= $this->InformeAlumno->find()->select(['InformeAlumno.id_informe'])->where(['InformeAlumno.id_alumno ='=>$id_alumno]);
            $informes = $this->InformePedagogico->find('list',['keyField' => 'id','valueField' => 'titulo'])->where(['InformePedagogico.id IN'=>$query]);
            $query->enableHydration(false);
            $query = $query->toList(); 
            
                if ($this->request->is('post')) {
                 $data = $this->request->getData();
                 return $this->redirect(['action' => 'verInformeAlumno', $data['informes'],$id_alumno]);
                }   
            
            if(count($query) > 0){
                $this->set(compact('informes')); 
            } else {
                  $this->Flash->success(__('Este alumno no tiene informes.'));
                  return $this->redirect(['controller' => 'Alumnos','action' => 'view',$id_alumno]);
            }
        }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $informePedagogico = $this->InformePedagogico->newEntity();
        
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $informePedagogico = $this->InformePedagogico->patchEntity($informePedagogico,$data);
            $informePedagogico->id_centro = $data['centros'];
            $informePedagogico->id_turno = $data['turnos'];
            $informePedagogico->status = true;
            
            if ($this->InformePedagogico->save($informePedagogico)) {

                $this->Flash->success(__('The informe pedagogico has been saved.'));
                return $this->redirect(['controller'=>'Evidencias','action' => 'add',$informePedagogico->id]);
            }
            
            $this->Flash->error(__('The informe pedagogico could not be saved. Please, try again.'));
        }
        $turnos = $this->Turno->find('list', ['keyField' => 'id','valueField' => 'nombre']);
        $centros = $this->Centro->find('list', ['keyField' => 'id','valueField' => 'name']);
        $this->set(compact('informePedagogico','turnos','centros'));
    }
    /** 
     * Edit method
     *
     * @param string|null $id Informe Pedagogico id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $informePedagogico = $this->InformePedagogico->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $informePedagogico = $this->InformePedagogico->patchEntity($informePedagogico, $this->request->getData());
            if ($this->InformePedagogico->save($informePedagogico)) {
                $this->Flash->success(__('El informe pedagogico ha sido guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El informe pedagogico no ha sido guardado.'));
        }
        $this->set(compact('informePedagogico'));
    } 

    public function eliminarInformeAlumno($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        
        $alumno = $this->Alumnos->get($id);
        
        $informeAlumno = $this->InformeAlumno->find('all')->where(['InformeAlumno.id_alumno =' => $alumno->id]);
                    $informeAlumno = $informeAlumno->first();
        
        if ($this->InformeAlumno->delete($informeAlumno)) {

            /* $evidenciaResultadoAlumnos = $this->EvidenciaResultadoAlumno->find('all')->where(['EvidenciaResultadoAlumno.id_alumno =' =>$alumno->id]);*/

             foreach ($evidenciaResultadoAlumnos as $evidenciaResultadoAlumno) {
                 $this->EvidenciaResultadoAlumno->delete($evidenciaResultadoAlumno);
             }

               $observacionesInformes = $this->ObservacionesInforme->find('all')->where(['ObservacionesInforme.id_alumno =' =>$alumno->id]);

             foreach ($observacionesInformes as $observacionesInforme) {
                 $this->ObservacionesInforme->delete($observacionesInforme);
             }

            $derivacionesAlumnos = $this->DerivacionesAlumnos->find('all')->where(['DerivacionesAlumnos.id_alumno =' =>$alumno->id]);

             foreach ($derivacionesAlumnos as $derivacionesAlumno) {
                 $this->DerivacionesAlumnos->delete($derivacionesAlumno);
             }

            $this->Flash->success(__('El informe del alumno ' . " " . $alumno->name . " " . $alumno->surname . " ha sido eliminado"));
             return $this->redirect(['controller' => 'Alumnos','action' => 'view',$alumno->id]);
    
        } else {
            $this->Flash->error(__('El informe no pudo guardarse.'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Informe Pedagogico id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $informePedagogico = $this->InformePedagogico->get($id);

        $tieneInforme = $this->InformeAlumno->find("all")->where(['InformeAlumno.id_informe =' => $alumno->id]);
        $tieneInforme->enableHydration(false);
        $tieneInforme = $tieneInforme->toList(); 

        if(count($tieneInforme) < 0) {
            if ($this->InformePedagogico->delete($informePedagogico)) {

            
                 $subquery = $this->Derivaciones->find()
                                            ->select(['Derivaciones.id'])
                                            ->where(['Derivaciones.id_informe =' => $id]);
                
                $evidenciaResultados = $this->EvidenciasResultado->find('all')->where(['EvidenciaResultadoAlumno.id_evidencia IN' => $subquery]);

             foreach ($evidenciaResultados as $evidenciaResultado) {
                 $this->EvidenciaResultadoAlumno->delete($evidenciaResultadoAlumno);
             }
             $evidencias = $this->Evidencias->find('all')->where(['Evidencias.id_informe =' => $id]);
                foreach ($evidencias as $evidencia) {
                       $this->Evidencias->delete($evidencias);
                }

                $this->Flash->success(__('El informe pedagogico ha sido eliminado.'));
            } else {
                $this->Flash->error(__('El informe pedagogico no pudo guardarse.'));
            }
            return $this->redirect(['action' => 'index']);

        } else {
             $this->Flash->error(__('Hay alumnos con ese informe. Cree uno nuevo.'));
             return $this->redirect(['action' => 'add']);
        }
    }
}
