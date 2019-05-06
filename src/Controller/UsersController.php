<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Enum\RolesEnum;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Auth\DefaultPasswordHasher;

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
        $this->loadModel('Centro');
        //$this->loadModel('UsersTurno');
        $this->loadComponent('FileUpload');

        $this->Auth->allow('forgotMyPassword');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user_session = $this->Auth->user();
        $users = $this->paginate($this->Users->find('all',[
            'contain' => ['Roles']
        ]),['limit' => 15]);

       

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
        $centros =  array();
        $taller_query = $this->Taller->findById_user($id);
        $taller = $taller_query->first();
        
        $centros_query = $this->UsersCentro->findById_user($id);
       
        foreach ($centros_query as $centroUser) {
          $centros[] =  $this->Centro->get($centroUser->id_centro);
        }

        $this->set(compact('user','centros','taller'));
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
                "id_user" =>  $user->id,
                'id_turno' => $data['turnos']
              );
              $userCentro = $this->UsersCentro->patchEntity($usersCentro,$datos1);
              if ($this->UsersCentro->save($userCentro)) {  
                  return $this->redirect(['controller'=>'Taller','action' => 'addProfeToTaller',$user->id]);  
              }
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
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
                  'id_centro' => $data['id_centro'],
                  'id_turno' => $data['id_turno'] 
                );
            $userCentro = $this->UsersCentro->patchEntity($usersCentro,$datos);
            
            if ($this->UsersCentro->save($userCentro)) {
                
                return $this->redirect(['controller'=>'Alumnos','action' => 'index']);
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
        $img = $user->image;
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
        $centros = $this->Users->Centro->find('all', ['keyField' => 'id',
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

    public function forgotMyPassword() {
        
        $data = $this->request->getData();
        
        if ($this->request->is('post')) {
            
            $user = $this->Users
                ->findByEmail($data['email'])
                ->first();
            
            if ($user) {
                
                $new_pass= substr(md5(time()), 0, 8);
                $email = new Email();
                $email->transport('default');
                $email->setViewVars(['password' => $new_pass, 'username' => $user->name]);
                $email
                    ->template('reset_pass')
                    ->emailFormat('html')
                    ->subject('Recuperacion de contraseña')
                    ->to($data['email'])
                    ->from('contacto@memoriaescolar.com');
                
                if ($email->send() != null) {

                    $user->password = $new_pass;
                    $this->Users->save($user);
                    $this->Flash->success(__('Se te envio un email con tu nueva contraseña.'));
                
                }
            }
        }
    }

    public function changePassword() {
        
        $user = $this->Users->get($this->Auth->user('id'));
        
        if ($this->request->is(['patch', 'post', 'put'])) {
           
            $data = $this->request->getData();


            if ((new DefaultPasswordHasher)->check($data['0_password'], $user->password)) {

              $user = $this->Users->patchEntity($user, $data);

              $user->password = $data['pass'];

                if ($this->Users->save($user)) {
                    
                    $this->Auth->setUser($user->toArray());
                    $this->Flash->success(__('La contraseña ha sido cambiada.'));
                
                } else {
                    
                    $this->Flash->error(__('Hubo un error la contraseña no pudo cambiarse. Verifique los datos.'));
                }
            
            } else{
            
              $this->Flash->error(__('No ha ingresado correctamente su contraseña. Porfavor, intentelo de nuevo.'));
              return $this->redirect(['action' => 'changePassword']);
            
            } 
           
            
          
         
        
        }

        $this->set(compact('user'));
    }
    


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
