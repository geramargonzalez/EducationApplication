<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

/**
 * Taller Controller
 * @property \App\Model\Table\TallerTable $Taller
 * @method \App\Model\Entity\Taller[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TallerController extends AppController
{
    
      public function isAuthorized($user = null)
    {
        if (in_array($this->request->params['action'], ['add','delete'])) {
            if ($user['role_id'] != 3) {
                $this->Flash->error(__('Acceso denegado!'));
                return false;
            }
        }
        return parent::isAuthorized($user);
    }


     public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
        $this->loadModel('Alumnos');
        $this->loadModel('Roles');
    }
    /**
     * Index method
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //$id_user = $this->Auth->user('id');
        $qry = $this->Taller->find('all');
        $talleres = $this->paginate($qry, ['limit' => 10]);
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
        $taller = $this->Taller->get($id);
        if($taller->id_user != 0){
            $user= $this->Users->get($taller->id_user);
        } else {
             $user = null;
        }
        $alumnos = $this->Alumnos->find('all')->where(['id_taller =' => $taller->id]);

        $cant = $this->Alumnos->find();
                          $cant->select(['count' => $cant->func()->count('*')])
                                   ->where(['id_taller' => $taller->id]);                    
        $cantidad= $cant->first()->count;
        $this->set(compact('taller', 'alumnos','user','cantidad'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taller = $this->Taller->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $taller = $this->Taller->patchEntity($taller, $data);
            $taller->id_user = 0;
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
