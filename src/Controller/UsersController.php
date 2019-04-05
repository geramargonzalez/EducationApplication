<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Enum\RolesEnum;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

     public function initialize()
    {
        parent::initialize();
        $this->loadModel('Taller');
        //$this->loadModel('TallerUsers');
    }

    public function isAuthorized($user = null)
    {
        if (in_array($this->request->params['action'], ['add'])) {
            if ($user['role_id'] != 3) {
                $this->Flash->error(__('Acceso denegado!'));
                return false;
            }
        }
        return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
     
        $user_session = $this->Auth->user();
        
        $users = $this->paginate($this->Users,['limit' => 15]);
        $this->set(compact('users','user_session'));
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        $this->set('user', $user);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
    
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $taller = $this->Taller->get($data['talleres']);
                $taller->id_user = $user->id;
                if ($this->Taller->save($taller)) {
                    $this->Flash->success(__('The user has been saved.'));
                 }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $talleres = $this->Taller->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list');
        $turnos = $this->Users->Turno->find('list', ['keyField' => 'id',
                    'valueField' => 'nombre']);
        $this->set(compact('user','roles','talleres','turnos'));
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $talleres = $this->Taller->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $turnos = $this->Users->Turno->find('list', ['keyField' => 'id',
                    'valueField' => 'nombre']);
        $this->set(compact('user', 'roles','turnos','talleres'));
    }
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    //
     public function login()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }  
    }
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
}
