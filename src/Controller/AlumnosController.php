<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

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
    }
    /**
     
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $id_user = $this->Auth->user('id');
        $query = $this->Taller->findById_user($id_user);
        $taller = $query->first();

        // ***** VER VER VER VER VER VER VER VER VER VER VER VER VER *****
        // ***** YA ESTA IMPLEMENTADO QUE SE BUSQUE ALUMNO POR TALLER ****

       /* 
        if($taller->role_id == 5){
          $alumnos = $this->paginate($this->Alumnos->find("all")->where(['id_taller =' => $taller->id]));
        } else {
          $alumnos = $this->paginate($this->Alumnos);      
        }
        */

        $alumnos = $this->paginate($this->Alumnos,['limit' => 100]);      
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
        $alumno = $this->Alumnos->get($id);
        if($alumno->id_taller != 0){
            $taller  = $this->Taller->get($alumnos->id_taller);
            $nombre = $taller->name;
        } else {
            $nombre = "No tiene ";
        }
        $this->set(compact('alumno','nombre'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alumno = $this->Alumnos->newEntity();
        if ($this->request->is('post')) {
            $alumno = $this->Alumnos->patchEntity($alumno, $this->request->getData());
            $alumno->id_centro = 1;
            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success(__('The alumno has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumno could not be saved. Please, try again.'));
        }
        $turnos = $this->Turno->find('list', ['keyField' => 'id',
                                             'valueField' => 'nombre']);
        $this->set(compact('alumno','turnos'));
    }

     public function addAlumnosToTaller($id = null)
    {
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
        $alumnos = $this->Alumnos->find("all")->where(['id_taller =' => 0]);
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
        $talleres = $this->Alumnos->Taller->find('list')->where(['role_id' => 5,'id_turno' => $user['id_turno']]);
        $alumnos = $this->Alumnos->find('list')->where(['id_taller <' => 1,'id_turno' => $user['id_turno']]);
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
            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success(__('The alumno has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('alumno'));
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
        if ($this->Alumnos->delete($alumno)) {
            $this->Flash->success(__('The alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

       public function deleteByAlumno($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumnos->get($id);
        $alumno->id_taller = 0;
        if ($this->Alumnos->save($alumno)) {
            $this->Flash->success(__('El alumno ha sido quitado del taller'));
        } else {
            $this->Flash->error(__('Se produjo un error, el alumno no puede ser quitado.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
