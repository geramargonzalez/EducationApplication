<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subsistema Controller
 *
 * @property \App\Model\Table\SubsistemaTable $Subsistema
 *
 * @method \App\Model\Entity\Subsistema[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubsistemaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $subsistema = $this->paginate($this->Subsistema);

        $this->set(compact('subsistema'));
    }

    /**
     * View method
     *
     * @param string|null $id Subsistema id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subsistema = $this->Subsistema->get($id, [
            'contain' => []
        ]);

        $this->set('subsistema', $subsistema);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subsistema = $this->Subsistema->newEntity();
        if ($this->request->is('post')) {
            $subsistema = $this->Subsistema->patchEntity($subsistema, $this->request->getData());
            if ($this->Subsistema->save($subsistema)) {
                $this->Flash->success(__('The subsistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subsistema could not be saved. Please, try again.'));
        }
        $this->set(compact('subsistema'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subsistema id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $subsistema = $this->Subsistema->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subsistema = $this->Subsistema->patchEntity($subsistema, $this->request->getData());
            if ($this->Subsistema->save($subsistema)) {
                $this->Flash->success(__('The subsistema has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subsistema could not be saved. Please, try again.'));
        }
        $this->set(compact('subsistema'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subsistema id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subsistema = $this->Subsistema->get($id);
        if ($this->Subsistema->delete($subsistema)) {
            $this->Flash->success(__('The subsistema has been deleted.'));
        } else {
            $this->Flash->error(__('The subsistema could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
