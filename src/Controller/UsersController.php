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
        $this->loadModel('UsersCentro');
        $this->loadModel('UsersTurno');
        $this->loadComponent('FileUpload');
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
        $taller_query = $this->Taller->findById_user($id);
        $taller = $taller_query->first();
        $this->set('user', $user,'taller',$taller);
    }

     public function profile($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        $taller_query = $this->Taller->findById_user($id);
        $taller = $taller_query->first();

       // $this->set('user', $user,'taller',$taller);
         $this->set(compact('user','taller'));
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
            $user->id_centro = $data['centros'];
            $user->id_turno = $data['turnos'];
           
            if (!empty($data['image'])) {
                  $result = $this->FileUpload->fileUpload($data['image'], 'users');
                  $user->image = USER_IMG_PATH . DS . $result['file_name'];
            } else {
               $user->image = "null";
            }
            

            if ($this->Users->save($user)) {

                $usersCentro = $this->UsersCentro->newEntity();
                $datos1  =  array(
                  'id_centro' => $data['centros'],
                  "id_user" =>  $user->id
                  
                );
              $userCentro = $this->UsersCentro->patchEntity($usersCentro,$datos1);
              $usersTurno = $this->UsersTurno->newEntity();
              $datos2  =  array(
                    'id_turno' => $data['turnos'],
                    "id_user" =>  $user->id
                  );
              $usersTurno = $this->UsersTurno->patchEntity($usersTurno,$datos2);
           

                if ($this->UsersCentro->save($userCentro)) {
                    if ($this->UsersTurno->save($usersTurno)) {
                        return $this->redirect(['controller'=>'Taller','action' => 'addProfeToTaller',$user->id]);
                    }
                }
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        //$talleres = $this->Taller->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list');
        $turnos = $this->Users->Turno->find('list', ['keyField' => 'id',
                    'valueField' => 'nombre']);
        $centros = $this->Users->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name']);
        $this->set(compact('user','roles','turnos','centros'));
    }

    public function addCentroTurnoUsers(){

        $user_session = $this->Auth->user();
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $usersCentro = $this->UsersCentro->newEntity();
            $datos  =  array(
                  "id_user" =>  $user_session['id'],
                  'id_centro' => $data['centros']
                );
            $userCentro = $this->UsersCentro->patchEntity($usersCentro,$datos);
            $usersTurno = $this->UsersTurno->newEntity();
            $datos  =  array(
                  "id_user" =>  $user_session['id'],
                  'id_turno' => $data['turnos']
                );
            $usersTurno = $this->UsersTurno->patchEntity($usersTurno,$datos);
            if ($this->UsersCentro->save($userCentro)) {
                if ($this->UsersTurno->save($usersTurno)) {
                    return $this->redirect(['controller'=>'Alumnos','action' => 'index']);
              }
            } 
        }
        $turnos = $this->Users->Turno->find('list', ['keyField' => 'id',
                    'valueField' => 'nombre']);
        $centros = $this->Users->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name']);
        $this->set(compact('user_session','roles','turnos','centros'));
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
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (!empty($data['image'])) {
                      $result = $this->FileUpload->fileUpload($data['image'], 'users');
                      $user->image = USER_IMG_PATH . DS . $result['file_name'];
                  } else {
                      $user->image = $img;
                  }
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
         $centros = $this->Users->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name']);
        $this->set(compact('user', 'roles','turnos','talleres','centros'));
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
