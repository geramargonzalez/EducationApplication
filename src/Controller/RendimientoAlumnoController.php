<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RendimientoAlumno Controller
 *
 * @property \App\Model\Table\RendimientoAlumnoTable $RendimientoAlumno
 *
 * @method \App\Model\Entity\RendimientoAlumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RendimientoAlumnoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $rendimientoAlumno = $this->paginate($this->RendimientoAlumno);

        $this->set(compact('rendimientoAlumno'));
    }

    /**
     * View method
     *
     * @param string|null $id Rendimiento Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rendimientoAlumno = $this->RendimientoAlumno->get($id, [
            'contain' => []
        ]);

        $this->set('rendimientoAlumno', $rendimientoAlumno);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rendimientoAlumno = $this->RendimientoAlumno->newEntity();
        if ($this->request->is('post')) {
            $rendimientoAlumno = $this->RendimientoAlumno->patchEntity($rendimientoAlumno, $this->request->getData());
            if ($this->RendimientoAlumno->save($rendimientoAlumno)) {
                $this->Flash->success(__('The rendimiento alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rendimiento alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('rendimientoAlumno'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rendimiento Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rendimientoAlumno = $this->RendimientoAlumno->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rendimientoAlumno = $this->RendimientoAlumno->patchEntity($rendimientoAlumno, $this->request->getData());
            if ($this->RendimientoAlumno->save($rendimientoAlumno)) {
                $this->Flash->success(__('The rendimiento alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rendimiento alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('rendimientoAlumno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rendimiento Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rendimientoAlumno = $this->RendimientoAlumno->get($id);
        if ($this->RendimientoAlumno->delete($rendimientoAlumno)) {
            $this->Flash->success(__('The rendimiento alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The rendimiento alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
