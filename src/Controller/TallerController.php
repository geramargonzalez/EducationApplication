<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use App\Enums\RolesEnum;
 
/**
 * Taller Controller
 * @property \App\Model\Table\TallerTable $Taller
 * @method \App\Model\Entity\Taller[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TallerController extends AppController
{
  
     public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Alumnos');
        $this->loadModel('Roles');
        $this->loadModel('Turno');
        $this->loadModel('Users');
        $this->loadModel('AlumnosTaller');
    }
    /**
     * Index method
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user = $this->Auth->user();
        $qry = $this->Taller->find('all')->where(['id_turno =' => $user['id_turno'], 'id_centro =' => $user['id_centro']]);
        $talleres = $this->paginate($qry, ['limit' => 50]);
        $this->set(compact('talleres'));
    }
    /**
     * View method
     * @param string|null $id Taller id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
       
        $taller_query = $this->Taller->find('all')->where(['id ='=>$id]);
        $taller = $taller_query->first();
        if($taller->id_user != 0){
            $user= $this->Users->get($taller->id_user);
        } else {
            $user = "No hay docente definido";
        }
        $talleresAlumnos = $this->AlumnosTaller->find('all')->where(['id_taller' => $id]);
        $alumnos = array();
        $cantidad = 0;
        foreach ($talleresAlumnos as $tallerAlumno) {
            $alumnos[] = $this->Alumnos->get($tallerAlumno->id_alumno);
            $cantidad++;
        }
        $this->set(compact('taller', 'alumnos','cantidad','user'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersession = $this->Auth->user();
        $taller = $this->Taller->newEntity();
       
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $taller = $this->Taller->patchEntity($taller, $data);
            $taller->id_user = $usersession['id'];
            $taller->id_centro = $data['centros'];
            $taller->id_turno = $data['turnos'];
            
            if ($this->Taller->save($taller)) {
                $this->Flash->success(__('The taller has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The taller could not be saved. Please, try again.'));
        }
        $roles = $this->Roles->find('list')->where(['id >' => 3]);
        $turnos = $this->Turno->find('list', ['keyField' => 'id',
                    'valueField' => 'nombre']);
        $centros = $this->Taller->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name']);
        $this->set(compact('taller','roles','turnos','centros'));
    } 

    public function addProfeToTaller($id_user = null)
    {
        $user = $this->Users->get($id_user);
        $taller = $this->Taller->newEntity();
        
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $taller = $this->Taller->patchEntity($taller, $data);
            $taller->id_user = $user->id;
            $taller->id_centro = $data['centros'];
            $taller->id_turno = $data['turnos'];
            if ($this->Taller->save($taller)) {
                $this->Flash->success(__('The taller has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The taller could not be saved. Please, try again.'));
        }
        $roles = $this->Roles->find('list')->where(['id >' => 3]);
        $turnos = $this->Turno->find('list', ['keyField' => 'id',
                    'valueField' => 'nombre']);
        $centros = $this->Taller->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name']);
        $this->set(compact('taller','roles','turnos','centros'));
    } 
    /**
     * Edit method
     * @param string|null $id Taller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */ 
    public function edit($id = null)
    {
        $taller = $this->Taller->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taller = $this->Taller->patchEntity($taller, $this->request->getData());
            if ($this->Taller->save($taller)) {
                $this->Flash->success(__('The taller has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The taller could not be saved. Please, try again.'));
        }
        $roles = $this->Roles->find('list')->where(['id >' => 3]);
        $this->set(compact('taller','roles'));
    }
    /**
     * Delete method
     * @param string|null $id Taller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taller = $this->Taller->get($id);
        if ($this->Taller->delete($taller)) {
            $this->Flash->success(__('The taller has been deleted.'));
        } else {
            $this->Flash->error(__('The taller could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
