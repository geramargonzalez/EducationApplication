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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
    
        $id_user = $this->Auth->user('id');    
        $qry = $this->ObservacionesAlumnos
            ->find('all')
            ->where([
                'ObservacionesAlumnos.id_alumno' => $id
            ]);
        $user = $this->ObservacionesAlumnos->Users->get($id_user);
        $alumno = $this->ObservacionesAlumnos->Alumnos->get($id);
        $observacionesAlumnos = $this->paginate($qry, ['limit' => 10]);
        $this->set(compact('observacionesAlumnos','alumno','user'));
    }

    /**
     * View method
     *
     * @param string|null $id Observaciones Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $id_alumno = null)
    {
        $id_user = $this->Auth->user('id');    
        $observacionesAlumno = $this->ObservacionesAlumnos->get($id);
        $alumno = $this->ObservacionesAlumnos->Alumnos->get($id_alumno);
        $user = $this->ObservacionesAlumnos->Users->get($id_user);
        //debug($alumno);
        //exit;
        //$this->set('observacionesAlumno', $observacionesAlumno, 'alumno', $alumno);
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
            $observacionesAlumno = $this->ObservacionesAlumnos->patchEntity($observacionesAlumno, $this->request->getData());
            
            $observacionesAlumno->id_user = $id_user;
            $observacionesAlumno->id_alumno = $id;
           
            if ($this->ObservacionesAlumnos->save($observacionesAlumno)) {
                $this->Flash->success(__('The observaciones alumno has been saved.'));
                return $this->redirect(['controller'=>'Alumnos','action' => 'view',$id]);
            }
            $this->Flash->error(__('The observaciones alumno could not be saved. Please, try again.'));
        }

        $alumno = $this->ObservacionesAlumnos->Alumnos->get($id);
        $this->set(compact('observacionesAlumno','alumno'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Observaciones Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $observacionesAlumno = $this->ObservacionesAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $observacionesAlumno = $this->ObservacionesAlumnos->patchEntity($observacionesAlumno, $this->request->getData());
            if ($this->ObservacionesAlumnos->save($observacionesAlumno)) {
                $this->Flash->success(__('The observaciones alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The observaciones alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('observacionesAlumno'));
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
        $this->request->allowMethod(['post', 'delete']);
        $observacionesAlumno = $this->ObservacionesAlumnos->get($id);
        if ($this->ObservacionesAlumnos->delete($observacionesAlumno)) {
            $this->Flash->success(__('The observaciones alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The observaciones alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
