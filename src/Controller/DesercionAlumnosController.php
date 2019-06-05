<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DesercionAlumnos Controller
 *
 * @property \App\Model\Table\DesercionAlumnosTable $DesercionAlumnos
 *
 * @method \App\Model\Entity\DesercionAlumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DesercionAlumnosController extends AppController
{

       public function initialize()
    {
        parent::initialize();
        $this->loadModel('Alumnos'); 
         $this->loadModel('UsersCentro'); 
         $this->loadModel('GrupoAlumnos');  
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $desercionAlumnos = $this->paginate($this->DesercionAlumnos->find('all',[
            'contain' => ['Alumnos']
        ]));

        $this->set(compact('desercionAlumnos'));
    }

    /**
     * View method
     *
     * @param string|null $id Desercion Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $desercionAlumno = $this->DesercionAlumnos->get($id, [
            'contain' => []
        ]);
        $this->set('desercionAlumno', $desercionAlumno);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        $desercionAlumno = $this->DesercionAlumnos->newEntity();
        
        if ($this->request->is('post')) {
           
            $data = $this->request->getData();
            $desercionAlumno = $this->DesercionAlumnos->patchEntity($desercionAlumno,$data);
            $desercionAlumno->id_alumno = $data['alumnos'];
            $alumno = $this->Alumnos->get($data['alumnos']);
            $alumno->status = false;
            $desercionAlumno->status = true;
            $desercionAlumno->id_user = $user['id']; 
            
            if ($this->Alumnos->save($alumno)) {
                if ($this->DesercionAlumnos->save($desercionAlumno)) {
                    $this->Flash->success(__('The desercion alumno has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('The desercion alumno could not be saved. Please, try again.'));
        }

        $users_centro = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);

        $users_turno = $this->UsersCentro->find()
                                       ->select(['UsersCentro.id_turno'])
                                       ->where(['UsersCentro.id_user =' => $user['id']]);  


        $query_grupo = $this->GrupoAlumnos->find()
                ->select(['GrupoAlumnos.id_alumno']);

        $alumnos = $this->Alumnos->find('list',['keyField' => 'id',
                                               'valueField' => 'full_name'])
                    ->where(['status =' => true])
                    ->andWhere([
                            'Alumnos.id_centro  IN' =>  $users_centro])
                              ->andWhere([
                            'Alumnos.id_turno IN' =>  $users_turno])
                    ->andWhere([
                    'Alumnos.id NOT IN' => $query_grupo
                ]);
        
        
       
        
        
      /*  $alumnos = $this->Alumnos->find('list',['keyField' => 'id',
                                               'valueField' => 'full_name'])
                    ->where(['status =' => true, 'id_turno =' => $user['id_turno'],'id_centro =' => $user['id_centro']])
                     ->andWhere([
                    'Alumnos.id NOT IN' => $subquery
                ]);*/

        $this->set(compact('desercionAlumno','alumnos'));
    }

      public function habilitar()
    {
        $user = $this->Auth->user();
        $desercionAlumno = $this->DesercionAlumnos->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $desercionAlumno = $this->DesercionAlumnos->patchEntity($desercionAlumno,$data);
            $alumno = $this->Alumnos->get($data['alumnos']);
            $alumno->status = true; 
            $desercionAlumno->status = false; 
            $desercionAlumno->id_user = $user['id'];
            $desercionAlumno->id_alumno = $data['alumnos']; 

            if ($this->Alumnos->save($alumno)) {
                if ($this->DesercionAlumnos->save($desercionAlumno)) {
                    $this->Flash->success(__('El alumno ha sido habilitado con exito.'));
                    return $this->redirect(['controller'=>'Alumnos','action' => 'index']);
                }
            }
            $this->Flash->error(__('El alumno no ha podido ser habilitado con exito.'));
        }
       

        $users_centro = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);

        $users_turno = $this->UsersCentro->find()
                                       ->select(['UsersCentro.id_turno'])
                                       ->where(['UsersCentro.id_user =' => $user['id']]);  


        $query_grupo = $this->GrupoAlumnos->find()
                ->select(['GrupoAlumnos.id_alumno']);

        $alumnos = $this->Alumnos->find('list',['keyField' => 'id',
                                               'valueField' => 'full_name'])
                    ->where(['status =' => false])
                    ->andWhere([
                            'Alumnos.id_centro  IN' =>  $users_centro])
                              ->andWhere([
                            'Alumnos.id_turno IN' =>  $users_turno])
                    ->andWhere([
                    'Alumnos.id NOT IN' => $query_grupo
                ]);
        
        $this->set(compact('desercionAlumno','alumnos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Desercion Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $desercionAlumno = $this->DesercionAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $desercionAlumno = $this->DesercionAlumnos->patchEntity($desercionAlumno, $this->request->getData());
            if ($this->DesercionAlumnos->save($desercionAlumno)) {
                $this->Flash->success(__('The desercion alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The desercion alumno could not be saved. Please, try again.'));
        }

        
        $this->set(compact('desercionAlumno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Desercion Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $desercionAlumno = $this->DesercionAlumnos->get($id);
        if ($this->DesercionAlumnos->delete($desercionAlumno)) {
            $this->Flash->success(__('The desercion alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The desercion alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
