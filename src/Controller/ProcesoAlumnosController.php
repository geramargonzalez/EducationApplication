<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

require_once(ROOT.DS.'plugins'.DS.'GoogleCharts'.DS.'vendor'.DS.'GoogleCharts.php');

/**
 * ProcesoAlumnos Controller
 *
 * @property \App\Model\Table\ProcesoAlumnosTable $ProcesoAlumnos
 *
 * @method \App\Model\Entity\ProcesoAlumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcesoAlumnosController extends AppController
{

   // private $avg_conducta;
    //private $avg_expresionOral;
    //private $avg_rendimiento;

      public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        
        $this->getView()->loadHelper('GoogleCharts.GoogleCharts');
    }
    
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Alumnos');
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
        $procesoAlumno = $this->ProcesoAlumnos->newEntity();
        if ($this->request->is('post')) {
            $procesoAlumno = $this->ProcesoAlumnos->patchEntity($procesoAlumno, $this->request->getData());
            $procesoAlumno->promedio = ($procesoAlumno->conducta + $procesoAlumno->rendimiento + $procesoAlumno->expresion_oral)/3;
            $procesoAlumno->id_alumno = $id;
            $procesoAlumno->id_user = $this->Auth->user('id');
            if ($this->ProcesoAlumnos->save($procesoAlumno)) {
                $this->Flash->success(__('The proceso alumno has been saved.'));
                return $this->redirect(['controller' => 'Alumnos','action' => 'view',$procesoAlumno->id_alumno]);
            }
            $this->Flash->error(__('The proceso alumno could not be saved. Please, try again.'));
        }
        $alumno = $this->Alumnos->get($id);
        $this->set(compact('procesoAlumno','alumno'));
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

        // Calcular el promedio del alumno por mes
        $alumno = $this->Alumnos->get($id_alumno);
        $query = $this->Proceso->findById_alumno($id_alumno);
        $proceso = $query->first();

        $rounds = $this->Rounds->find('all')
                    ->select(['Round.score', 'Round.event_date'])
                    ->where(['Round.user_id' => $this->Auth->user('id')])
                    ->order(['Round.event_date' => 'ASC'])
                    ->limit(8)
                    ->toArray();
        
        $this->set(compact('alumno'));
    } 
    /**
     * Delete method
     *
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

    // Funciones 
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
