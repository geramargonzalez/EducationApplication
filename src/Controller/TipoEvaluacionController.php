<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoEvaluacion Controller
 *
 * @property \App\Model\Table\TipoEvaluacionTable $TipoEvaluacion
 *
 * @method \App\Model\Entity\TipoEvaluacion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoEvaluacionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tipoEvaluacion = $this->paginate($this->TipoEvaluacion);

        $this->set(compact('tipoEvaluacion'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Evaluacion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoEvaluacion = $this->TipoEvaluacion->get($id, [
            'contain' => []
        ]);

        $this->set('tipoEvaluacion', $tipoEvaluacion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoEvaluacion = $this->TipoEvaluacion->newEntity();
        if ($this->request->is('post')) {
            $tipoEvaluacion = $this->TipoEvaluacion->patchEntity($tipoEvaluacion, $this->request->getData());
            if ($this->TipoEvaluacion->save($tipoEvaluacion)) {
                $this->Flash->success(__('The tipo evaluacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo evaluacion could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoEvaluacion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Evaluacion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoEvaluacion = $this->TipoEvaluacion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoEvaluacion = $this->TipoEvaluacion->patchEntity($tipoEvaluacion, $this->request->getData());
            if ($this->TipoEvaluacion->save($tipoEvaluacion)) {
                $this->Flash->success(__('The tipo evaluacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo evaluacion could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoEvaluacion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Evaluacion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoEvaluacion = $this->TipoEvaluacion->get($id);
        if ($this->TipoEvaluacion->delete($tipoEvaluacion)) {
            $this->Flash->success(__('The tipo evaluacion has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo evaluacion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
