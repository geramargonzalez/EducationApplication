<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * ObservacionesAlumnos Controller
 *
 * @property \App\Model\Table\ObservacionesAlumnosTable $ObservacionesAlumnos
 *
 * @method \App\Model\Entity\ObservacionesAlumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ObservacionesAlumnosController extends AppController
{
    
       public function initialize()
    {
        parent::initialize();
        $this->loadModel('Tag');
        $this->loadModel('Alumnos');
    }
    /**
     * index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        $observacionesAlumnos = $this->ObservacionesAlumnos
            ->find('all')
            ->where([
                'ObservacionesAlumnos.id_alumno' => $id
            ])->order(['created' => 'DESC']);;
        $alumno = $this->ObservacionesAlumnos->Alumnos->get($id);
        
        //$observacionesAlumnos = $this->paginate($qry, ['limit' => 100]);
        $this->set(compact('observacionesAlumnos','alumno'));
    }
    /**
     * View methodo
     * @param string|null $id Observaciones Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $id_alumno = null)
    {  
        $observacionesAlumno = $this->ObservacionesAlumnos->get($id);
        $alumno = $this->ObservacionesAlumnos->Alumnos->get($id_alumno);
        $user = $this->ObservacionesAlumnos->Users->get($observacionesAlumno->id_user);
        $this->set(compact('observacionesAlumno','alumno','user'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $id_user = $this->Auth->user('id');
        $observacionesAlumno = $this->ObservacionesAlumnos->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $observacionesAlumno = $this->ObservacionesAlumnos->patchEntity($observacionesAlumno,$data);
            $observacionesAlumno->id_user = $id_user;
            $observacionesAlumno->id_alumno = $id;
            $observacionesAlumno->etiqueta = $data['tags'];
            if ($this->ObservacionesAlumnos->save($observacionesAlumno)) {
                $this->Flash->success(__('The observaciones alumno has been saved.'));
                return $this->redirect(['controller'=>'Alumnos','action' => 'view',$id]);
            }
            $this->Flash->error(__('The observaciones alumno could not be saved. Please, try again.'));
        }
        $alumno = $this->ObservacionesAlumnos->Alumnos->get($id);
        $tags = $this->Tag->find('list',[
                    'keyField' => 'name',
                    'valueField' => 'name',
            ]);
        $this->set(compact('observacionesAlumno','alumno','tags'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Observaciones Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null,$id_alumno = null)
    {
        $alumno = $this->Alumnos->get($id_alumno);
        $id_user = $this->Auth->user('id');
        $observacionesAlumno = $this->ObservacionesAlumnos->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $observacionesAlumno = $this->ObservacionesAlumnos->patchEntity($observacionesAlumno,$data);
            $observacionesAlumno->id_user = $id_user;
            $observacionesAlumno->id_alumno = $id_alumno;
            $observacionesAlumno->etiqueta = $data['tags'];
           
            if ($this->ObservacionesAlumnos->save($observacionesAlumno)) {
                $this->Flash->success(__('The observaciones alumno has been saved.'));
                return $this->redirect(['action' => 'index',$id_alumno]);
            }
            $this->Flash->error(__('La observacion no pudo guardarse. Verifique sus datos.'));
        }
        $tags = $this->Tag->find('list',[
                    'keyField' => 'name',
                    'valueField' => 'name',
            ]);
        $this->set(compact('observacionesAlumno','alumno','tags'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Observaciones Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $observacionesAlumno = $this->ObservacionesAlumnos->get($id);
        if ($this->ObservacionesAlumnos->delete($observacionesAlumno)) {
            $this->Flash->success(__('The observaciones alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The observaciones alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

      public function statsAlumnoObservacion($id_alumno = null)
    {
        $alumno = $this->Alumnos->get($id_alumno);
        $query = $this->ObservacionesAlumnos->findById_alumno($id_alumno);
        $obs = $query->select(['cantidad' => $query->func()->count('etiqueta'), 'etiqueta' =>'etiqueta'])
                  ->where(['id_alumno'  => $alumno->id])
                  ->group('etiqueta');
        $obs->enableHydration(false);
        $observaciones = $obs->toList(); 
        $this->set(compact('alumno','observaciones'));
    }
}
