<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
//use Cake\ORM\TableRegistry;
//use FusionCharts;
//require_once(ROOT .DS. 'vendor' . DS  . 'fusioncharts' . DS . 'fusioncharts.php');
//use GoogleCharts;
//require_once(ROOT.DS.'plugins'.DS.'GoogleCharts'.DS.'vendor'.DS.'GoogleCharts.php');


/**
 * ProcesoAlumnos Controller
 *
 * @property \App\Model\Table\ProcesoAlumnosTable $ProcesoAlumnos
 *
 * @method \App\Model\Entity\ProcesoAlumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcesoAlumnosController extends AppController
{
   
   public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
       // $this->viewBuilder()->helpers(['GoogleCharts.GoogleCharts']);
    }
   
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Alumnos');
        $this->loadModel('TipoEvaluacion');
        $this->loadModel('RendimientoAlumno');
        $this->loadModel('Taller');
        $this->loadModel('Users');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
         
         $id_user = $this->Auth->user('id');
         $qry = $this->ProcesoAlumnos
            ->find('all')
            ->where([
                'ProcesoAlumnos.id_alumno' => $id,
                'ProcesoAlumnos.id_user' => $id_user,  
            ]);
        $avg_rendimiento = $this->procesoAvgRendimiento($id,$id_user);
        $avg_expresionOral = $this->procesoAvgExpresionOral($id,$id_user);
        $avg_conducta = $this->procesoAvgConducta($id,$id_user);
        $avg_general = $this->procesoAvgGeneral($id,$id_user);
        $procesoAlumnos = $this->paginate($qry, ['limit' => 10]);
        $alumno = $this->Alumnos->get($id);
        $this->set(compact('procesoAlumnos','avg_conducta','avg_expresionOral','avg_rendimiento',
            'avg_general','alumno'));
    }
    /**
     * View method
     *
     * @param string|null $id Proceso Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $procesoAlumno = $this->ProcesoAlumnos->get($id);
        $this->set('procesoAlumno', $procesoAlumno);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        
        $id_user = $this->Auth->user('id');
        $procesoAlumno = $this->ProcesoAlumnos->newEntity();
        
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $procesoAlumno = $this->ProcesoAlumnos->patchEntity($procesoAlumno, $this->request->getData());
            $procesoAlumno->promedio = ($procesoAlumno->conducta + $procesoAlumno->rendimiento + $procesoAlumno->expresion_oral)/3;
            $procesoAlumno->id_alumno = $id;
            $procesoAlumno->id_user = $id_user;
            
            if(empty($data['conducta'])){
              $procesoAlumno->conducta = 0;
            } 
            if(empty($data['expresion_oral'])){
              $procesoAlumno->expresion_oral = 0;
            } 
             if(empty($data['rendimiento'])){
              $procesoAlumno->rendimiento = 0;
            }
            $rendimientoAlumno = $this->RendimientoAlumno->newEntity();
            $datos  =  array(
                  "id_alumno" =>  $id,
                  'rendimiento' => $data['rendimiento'],
                  'id_user' =>  $id_user,
                  'tipoevaluacion' => $data['tipoevaluacion']
                );

            $rendimientoAlumno = $this->RendimientoAlumno->patchEntity($rendimientoAlumno,$datos);

            if($this->RendimientoAlumno->save($rendimientoAlumno)){
               
               if ($this->ProcesoAlumnos->save($procesoAlumno)) {
                  $this->Flash->success(__('The proceso alumno has been saved.'));
                  return $this->redirect(['controller' => 'ProcesoAlumnos','action' => 'index', $id]);
               }else{
                $this->Flash->error(__('The proceso alumno could not be saved. Please, try again.'));
              }
            } else{
              $this->Flash->error(__('The proceso alumno could not be saved. Please, try again.'));
            }
           
        }
        
        $alumno = $this->Alumnos->get($id);
        $tipoEvaluacion = $this->TipoEvaluacion->find('list', ['keyField' => 'nombre',
                    'valueField' => 'nombre']);
        
        $this->set(compact('procesoAlumno','alumno','tipoEvaluacion'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Proceso Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $procesoAlumno = $this->ProcesoAlumnos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $procesoAlumno = $this->ProcesoAlumnos->patchEntity($procesoAlumno, $this->request->getData());
            if ($this->ProcesoAlumnos->save($procesoAlumno)) {
                $this->Flash->success(__('The proceso alumno has been saved.'));
                return $this->redirect(['controller'=>'Alumnos','action' => 'index']);
            }
            $this->Flash->error(__('The proceso alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('procesoAlumno'));
    }
     

      public function statsAlumnos($id_alumno = null)
    {

       // Estdisticas hechas por el profesor logeado
       $alumno = $this->Alumnos->get($id_alumno);
       $id_user = $this->Auth->user('id');
       
       $query = $this->ProcesoAlumnos->findById_alumnoAndId_user($id_alumno, $id_user);

       $queryDiarios = $this->ProcesoAlumnos->findById_alumnoAndId_user($id_alumno, $id_user);
       
      // $queryTortas = $this->RendimientoAlumno->findById_alumnoAndId_user($id_alumno, $id_user);
      
        //'expresion_oral' => $query->func()->avg('expresion_oral'),'conducta' => $query->func()->avg('conducta'),
        $rendi= $query->select(['rendimiento' => $query->func()->avg('rendimiento'), 'Mes' =>'MONTH(created)'])
                  ->where(['id_alumno'  => $alumno->id])
                  ->andWhere(['rendimiento >'  => 0])
                  ->group('MONTH(created)')
                  ->order(['MONTH(created)' => 'ASC']);

         $cond = $query->select(['conducta' => $query->func()->avg('conducta'), 'Mes' =>'MONTH(created)'])
                  ->where(['id_alumno'  => $alumno->id])
                  ->andWhere(['conducta >'  => 0])
                  ->group('MONTH(created)')
                  ->order(['MONTH(created)' => 'ASC']);

        $expre = $query->select(['expresion_oral' => $query->func()->avg('expresion_oral'), 'Mes' =>'MONTH(created)'])
                  ->where(['id_alumno'  => $alumno->id])
                  ->andWhere(['expresion_oral >'  => 0])
                  ->group('MONTH(created)')
                  ->order(['MONTH(created)' => 'ASC']);

       
        $rendi->enableHydration(false);
        $rendimiento = $rendi->toList(); 

        $cond->enableHydration(false);
        $conducta = $cond->toList();

        $expre->enableHydration(false);
        $expresion_oral = $expre->toList();

        ////////////////////////// @@@@@@@@@@@@ ///////////////////


        $rendi_diario = $queryDiarios->select(['rendimiento' => 'rendimiento', 'Dia' =>'DAY(created)','Mes' =>'MONTH(created)'])
                  ->where(['id_alumno'  => $alumno->id])
                  ->andWhere(['rendimiento >'  => 0])
                  ->order(['DAY(created)' => 'ASC']);
        
        $rendi_diario->enableHydration(false);
        $rendimiento_diario = $rendi_diario->toList(); 

        $condu_diario = $queryDiarios->select(['conducta' => 'conducta', 'Dia' =>'DAY(created)','Mes' =>'MONTH(created)'])
                  ->where(['id_alumno'  => $alumno->id])
                  ->andWhere(['conducta >'  => 0])
                  ->order(['DAY(created)' => 'ASC']);
       
        $condu_diario->enableHydration(false);
        $conducta_diario = $condu_diario->toList(); 

        $expre_diario = $queryDiarios->select(['expresion_oral' => 'expresion_oral', 'Dia' =>'DAY(created)','Mes' =>'MONTH(created)'])
                                ->where(['id_alumno'  => $alumno->id])
                                ->andWhere(['expresion_oral >'  => 0])
                                ->order(['MONTH(created)' => 'ASC']);

        $expre_diario->enableHydration(false);
        $expresion_oral_diario = $expre_diario->toList(); 

        //debug($expresion_oral_diario);
       // exit;
        $this->set(compact('alumno','rendimiento','expresion_oral_diario'));
    }
    
   public function statsAlumnosGenerales($id_alumno = null){


       // Estdisticas globales de ese alumno
      $alumno = $this->Alumnos->get($id_alumno);
    //  $id_user = $this->Auth->user('id');
      $query = $this->ProcesoAlumnos->findById_alumno($id_alumno);

    //  $queryDiarios = $this->ProcesoAlumnos->findById_alumno($id_alumno);

      $queryTortas = $this->RendimientoAlumno->findById_alumno($id_alumno);

      $rendi= $query->select(['rendimiento' => $query->func()->avg('rendimiento'), 'Mes' =>'MONTH(created)'])
                 ->andWhere(['rendimiento >'  => 0])
                  ->group('MONTH(created)')
                  ->order(['MONTH(created)' => 'ASC']);

      $cond = $query->select(['conducta' => $query->func()->avg('conducta'), 'Mes' =>'MONTH(created)'])
                  ->andWhere(['conducta >'  => 0])
                  ->group('MONTH(created)')
                  ->order(['MONTH(created)' => 'ASC']);

      $expre = $query->select(['expresion_oral' => $query->func()->avg('expresion_oral'), 'Mes' =>'MONTH(created)'])
                ->where(['id_alumno'  => $alumno->id])
                ->andWhere(['expresion_oral >'  => 0])
                ->group('MONTH(created)')
                ->order(['MONTH(created)' => 'ASC']);

      $tipoEva = $queryTortas->select(['rendimiento' => $query->func()->Sum('rendimiento'), 'tipo_evaluacion' =>'tipoevaluacion'])
                ->where(['id_alumno'  => $alumno->id])
                ->group('tipoevaluacion')
                ->order(['rendimiento' => 'ASC']);

       
      $rendi->enableHydration(false);
      $rendimiento = $rendi->toList(); 

      $cond->enableHydration(false);
      $conducta = $cond->toList();

      $expre->enableHydration(false);
      $expresion_oral = $expre->toList();

      $tipoEva->enableHydration(false);
      $tipo_evaluacion = $tipoEva->toList();

      $this->set(compact('alumno','rendimiento','tipo_evaluacion'));
       
    }
   /* public function statsAlumnosMateria($id_taller = null){
      
      $taller = $this->Taller->get($id_taller);

      $user = $this->Users->get($taller->id_user);

      $query = $this->ProcesoAlumnos->findById_user($user->id);
      $queryTortas = $this->RendimientoAlumno->findById_user($user->id);
      
      $rendi= $query->select(['rendimiento' => $query->func()->avg('rendimiento'), 'Mes' =>'MONTH(created)'])
                ->where(['id_user'  => $user->id])
                ->group('MONTH(created)')
                ->order(['rendimiento' => 'DESC']);

      $tipoEva = $queryTortas->select(['rendimiento' => $query->func()->Sum('rendimiento'), 'tipo_evaluacion' =>'tipoevaluacion'])
                ->where(['id_user'  => $user->id])
                ->group('tipoevaluacion')
                ->order(['rendimiento' => 'DESC']);
      
      $rendi->enableHydration(false);
      $rendimiento = $rendi->toList(); 
      $tipoEva->enableHydration(false);
      $tipo_evaluacion = $tipoEva->toList();

      $this->set(compact('rendimiento','tipo_evaluacion','taller'));
       
    }*/

    public function statsAlumnosDesabilitadosHabilitados(){
      // Se van a mostar los alumnos que desabilitaron y los meses donde dejaron.
    }

    /**
     * Delete method
     * @param string|null $id Proceso Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $procesoAlumno = $this->ProcesoAlumnos->get($id);
        if ($this->ProcesoAlumnos->delete($procesoAlumno)) {
            $this->Flash->success(__('The proceso alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The proceso alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller'=>'Alumnos','action' => 'index']);
    }

    public function procesoAvgRendimiento($id = null, $user_id = null){
        $query = $this->ProcesoAlumnos->findById_alumnoAndId_user($id,$user_id);
        $rendi = $query->select(['avg' => $query->func()->avg('rendimiento')])->first();
        return $rendi->avg;
    }
    public function procesoAvgExpresionOral($id = null, $user_id = null){
        $query = $this->ProcesoAlumnos->findById_alumnoAndId_user($id,$user_id);
        $exp_oral = $query->select(['avg' => $query->func()->avg('expresion_oral')])->first();
        return $exp_oral->avg;
    }
    public function procesoAvgConducta($id = null, $user_id = null){
        $query = $this->ProcesoAlumnos->findById_alumnoAndId_user($id,$user_id);
        $condu = $query->select(['avg' => $query->func()->avg('conducta')])->first();
        return $condu->avg;
    }
     public function procesoAvgGeneral($id = null, $user_id = null){
        $query = $this->ProcesoAlumnos->findById_alumnoAndId_user($id,$user_id);
        $condu = $query->select(['avg' => $query->func()->avg('promedio')])->first();
        return $condu->avg;
    }

}
