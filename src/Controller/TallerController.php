<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Taller Controller
 *
 * @property \App\Model\Table\TallerTable $Taller
 *
 * @method \App\Model\Entity\Taller[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TallerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $taller = $this->paginate($this->Taller);
        $this->set(compact('taller'));
    }
    /**
     * View method
     *
     * @param string|null $id Taller id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $taller = $this->Taller->get($id, [
            'contain' => []
        ]);

        $this->set('taller', $taller);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $taller = $this->Taller->newEntity();
        if ($this->request->is('post')) {
            $taller = $this->Taller->patchEntity($taller, $this->request->getData());
            if ($this->Taller->save($taller)) {
                $this->Flash->success(__('The taller has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The taller could not be saved. Please, try again.'));
        }
        $users = $this->Taller->Users->find('list', ['limit' => 200]);
        $this->set(compact('taller', 'users'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Taller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */ 
    public function edit($id = null)
    {
        $taller = $this->Taller->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $taller = $this->Taller->patchEntity($taller, $this->request->getData());
            if ($this->Taller->save($taller)) {
                $this->Flash->success(__('The taller has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The taller could not be saved. Please, try again.'));
        }
        $this->set(compact('taller'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Taller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $taller = $this->Taller->get($id);
        if ($this->Taller->delete($taller)) {
            $this->Flash->success(__('The taller has been deleted.'));
        } else {
            $this->Flash->error(__('The taller could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
