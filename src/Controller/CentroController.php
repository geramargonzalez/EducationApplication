<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Centro Controller
 *
 * @property \App\Model\Table\CentroTable $Centro
 *
 * @method \App\Model\Entity\Centro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CentroController extends AppController
{


    public function isAuthorized($user = null)
    {
        if (in_array($this->request->params['action'], ['add','delete','edit'])) {
            if ($user['role_id'] != 3) {
                $this->Flash->error(__('Acceso denegado!'));
                return false;
            }
        }
        return parent::isAuthorized($user);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $centro = $this->paginate($this->Centro);
        $this->set(compact('centro'));
    }

    /**
     * View method
     *
     * @param string|null $id Centro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $centro = $this->Centro->get($id, [
            'contain' => []
        ]);
        $this->set('centro', $centro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $centro = $this->Centro->newEntity();
        if ($this->request->is('post')) {
            $centro = $this->Centro->patchEntity($centro, $this->request->getData());
            if ($this->Centro->save($centro)) {
                $this->Flash->success(__('The centro has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The centro could not be saved. Please, try again.'));
        }
        $this->set(compact('centro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Centro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $centro = $this->Centro->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $centro = $this->Centro->patchEntity($centro, $this->request->getData());
            if ($this->Centro->save($centro)) {
                $this->Flash->success(__('The centro has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The centro could not be saved. Please, try again.'));
        }
        $this->set(compact('centro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Centro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $centro = $this->Centro->get($id);
        if ($this->Centro->delete($centro)) {
            $this->Flash->success(__('The centro has been deleted.'));
        } else {
            $this->Flash->error(__('The centro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
