<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use App\Enums\RolesEnum;

/**
 * Alumnos Controller
 *
 * @property \App\Model\Table\AlumnosTable $Alumnos
 *
 * @method \App\Model\Entity\Alumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlumnosController extends AppController
{
      public function initialize()
    {
        parent::initialize();
        $this->loadModel('Taller');
        $this->loadModel('Turno');
        $this->loadModel('Centro');
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
        $user = $this->Auth->user();
        $query = $this->Taller->findById_user($user['id']);
        $taller = $query->first();
       
       $qry = $this->Alumnos->find("all")->where(['status =' => true, 'id_turno =' => $user['id_turno'],'id_centro =' => $user['id_centro']]);
    

        /*$qry = $this->Alumnos->find('all')->join([
                                        'c' => [
                                            'table' => 'users_centro',
                                            'type' => 'LEFT',
                                            'conditions' => 'c.id_centro = alumnos.id_centro','c.id_user = ' . $user['id'],
                                        ],
                                        'u' => [
                                            'table' => 'users_turno',
                                            'type' => 'LEFT',
                                            'conditions' => 'u.id_turno = alumnos.id_turno','u.id_user = ' . $user['id'],
                                        ]
                                    ]);




                ->join([
                                        'table' => 'users_centro',
                                        'alias' => 'c',
                                        'type' => 'LEFT',
                                        'conditions' => 'c.id_centro = alumnos.id_centro', 'c.id_user = ' . $user['id']]);*/
                                  
       // $qry = $this->Alumnos->find('all')->matching('UsersCentro', function ($q) {
         //    return $q->where(['Alumnos.id_centro = UsersCentro.id_cento', 'UsersCentro.id_user =' . $user['id']]);
        // });

        

        $alumnos = $this->paginate($qry,['limit' => 100]);      
        $this->set(compact('alumnos'));
    }
    /**
     * View method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $alumno = $this->Alumnos->get($id);
        if($alumno->id_taller != 0){
            $taller  = $this->Taller->get($alumno->id_taller);
            $nombre = $taller->name;
        } else {
            $nombre = "No tiene taller asignado.";
        }
        $this->set(compact('alumno','nombre','user'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        $alumno = $this->Alumnos->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $alumno = $this->Alumnos->patchEntity($alumno,$data);
            $alumno->id_centro = $data['centros'];
            $alumno->id_taller = 0;
            $alumno->id_turno = $data['turnos'];
            $alumno->status = true;
           // debug($data);
           // exit;
           if (!empty($data['image'])) {
                  $result = $this->FileUpload->fileUpload($data['image'], 'users');
                  $alumno->image = USER_IMG_PATH . DS . $result['file_name'];
            } else {
               $alumno->image = "null";
            }
            // Hacer un find buscando ese Alumno, y si no lo encuentro mandar un mensaje de error
            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success(__('The alumno has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumno could not be saved. Please, try again.'));
        }
        
        $turnos = $this->Turno->find('list', ['keyField' => 'id',
                                             'valueField' => 'nombre']);
        $centros = $this->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name']);
        $this->set(compact('alumno','turnos','centros'));
    }

     public function addAlumnosToTaller($id = null)
    {
        $user = $this->Auth->user();
        $taller = $this->Alumnos->Taller->get($id);
        $alum_reg = 0;
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            
            foreach ($data as $key => $value) {
                if ($value == 1) {
                    $alumno = $this->Alumnos->get($key);
                    $alumno->id_taller = $taller->id;
                   if ($this->Alumnos->save($alumno)) {
                       $alum_reg++; 
                      }    
                }
            }
            if($alum_reg > 0){
                 $this->Flash->success(__('Los alumnos han sido registrados.'));
                 return $this->redirect(['controller' =>'Taller', 'action' => 'view',$taller->id]);
            } else{
                 $this->Flash->error(__('Se produjo un error.'));
            }
        }
        $alumnos = $this->Alumnos->find("all")->where(['status =' => true, 'id_turno =' => $user['id_turno'],'id_centro =' => $user['id_centro']]);
        $this->set(compact('alumnos','taller'));
    }

     public function addAlumnoToTaller(){

        $user = $this->Auth->user();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $taller = $this->Alumnos->Taller->get($data['talleres']);
            $alumno = $this->Alumnos->get($data['alumnos']);
            $alumno->id_taller = $taller->id;
           
            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success(__('El alumno se a ingresado en la materia.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Se produjo un error. Verifique sus datos.'));
        }
        $talleres = $this->Alumnos->Taller->find('list')->where(['role_id' => RolesEnum::TALLER,'id_turno' => $user['id_turno'], 'id_centro' => $user['id_centro']]);
        $alumnos = $this->Alumnos->find('list')->where(['status =' => true, 'id_turno =' => $user['id_turno'],'id_centro =' => $user['id_centro']]);
        $this->set(compact('alumnos','talleres'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alumno = $this->Alumnos->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
            $alumno->id_centro = 1;

              if (!empty($data['image'])) {
                        $result = $this->FileUpload->fileUpload($data['image'], 'users');
                        $user->image = USER_IMG_PATH . DS . $result['file_name'];
                    } else {
                        $user->image = $img;
                    }
            
            if ($this->Alumnos->save($alumno)) {

                $this->Flash->success(__('The alumno has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumno could not be saved. Please, try again.'));
        }
        
       $turnos = $this->Turno->find('list', ['keyField' => 'id',
                                             'valueField' => 'nombre']);
        $centros = $this->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name']);
        $this->set(compact('alumno','turnos','centros'));
    } 

    public function alumnosDesabilitados(){
        $alumnos = $this->paginate($this->Alumnos->find("all")->where(['status =' => false, 'id_turno =' => $user['id_turno'],'id_centro =' => $user['id_centro']]),['limit' => 100]);      
        $this->set(compact('alumnos'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumnos->get($id);
        $alumno->status = false;
        if ($this->Alumnos->save($alumno)) {
            $this->Flash->success(__('The alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

       public function deleteByAlumno($id = null, $id_taller = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumnos->get($id);
        $alumno->id_taller = 0;
        if ($this->Alumnos->save($alumno)) {
            $this->Flash->success(__('El alumno ha sido quitado del taller'));
        } else {
            $this->Flash->error(__('Se produjo un error, el alumno no puede ser quitado.'));
        }
        return $this->redirect(['controller'=>'Taller', 'action' => 'view', $id_taller]);
    }
}
