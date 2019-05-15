<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FaltasGrupo Controller
 *
 *
 * @method \App\Model\Entity\FaltasGrupo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FaltasGrupoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $faltasGrupo = $this->paginate($this->FaltasGrupo);

        $this->set(compact('faltasGrupo'));
    }

    /**
     * View method
     *
     * @param string|null $id Faltas Grupo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $faltasGrupo = $this->FaltasGrupo->get($id, [
            'contain' => []
        ]);

        $this->set('faltasGrupo', $faltasGrupo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faltasGrupo = $this->FaltasGrupo->newEntity();
        if ($this->request->is('post')) {
            $faltasGrupo = $this->FaltasGrupo->patchEntity($faltasGrupo, $this->request->getData());
            if ($this->FaltasGrupo->save($faltasGrupo)) {
                $this->Flash->success(__('The faltas grupo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The faltas grupo could not be saved. Please, try again.'));
        }
        $this->set(compact('faltasGrupo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Faltas Grupo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $faltasGrupo = $this->FaltasGrupo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faltasGrupo = $this->FaltasGrupo->patchEntity($faltasGrupo, $this->request->getData());
            if ($this->FaltasGrupo->save($faltasGrupo)) {
                $this->Flash->success(__('The faltas grupo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The faltas grupo could not be saved. Please, try again.'));
        }
        $this->set(compact('faltasGrupo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Faltas Grupo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faltasGrupo = $this->FaltasGrupo->get($id);
        if ($this->FaltasGrupo->delete($faltasGrupo)) {
            $this->Flash->success(__('The faltas grupo has been deleted.'));
        } else {
            $this->Flash->error(__('The faltas grupo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
