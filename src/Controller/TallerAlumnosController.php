<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TallerAlumnos Controller
 *
 * @property \App\Model\Table\TallerAlumnosTable $TallerAlumnos
 *
 * @method \App\Model\Entity\TallerAlumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TallerAlumnosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tallerAlumnos = $this->paginate($this->TallerAlumnos);
        $this->set(compact('tallerAlumnos'));
    }

    /**
     * View method
     *
     * @param string|null $id Taller Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tallerAlumno = $this->TallerAlumnos->get($id, [
            'contain' => []
        ]);

        $this->set('tallerAlumno', $tallerAlumno);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tallerAlumno = $this->TallerAlumnos->newEntity();
        if ($this->request->is('post')) {
            $tallerAlumno = $this->TallerAlumnos->patchEntity($tallerAlumno, $this->request->getData());
            if ($this->TallerAlumnos->save($tallerAlumno)) {
                $this->Flash->success(__('The taller alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The taller alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('tallerAlumno'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Taller Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tallerAlumno = $this->TallerAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tallerAlumno = $this->TallerAlumnos->patchEntity($tallerAlumno, $this->request->getData());
            if ($this->TallerAlumnos->save($tallerAlumno)) {
                $this->Flash->success(__('The taller alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The taller alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('tallerAlumno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Taller Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tallerAlumno = $this->TallerAlumnos->get($id);
        if ($this->TallerAlumnos->delete($tallerAlumno)) {
            $this->Flash->success(__('The taller alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The taller alumno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
