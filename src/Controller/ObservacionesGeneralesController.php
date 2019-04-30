<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ObservacionesGenerales Controller
 *
 * @property \App\Model\Table\ObservacionesGeneralesTable $ObservacionesGenerales
 *
 * @method \App\Model\Entity\ObservacionesGenerale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ObservacionesGeneralesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $observacionesGenerales = $this->paginate($this->ObservacionesGenerales->find()->where(['status =' => true]));

        $this->set(compact('observacionesGenerales'));
    }

     public function calendar()
    {
        $observacionesGenerales = $this->paginate($this->ObservacionesGenerales->find()->where(['status =' => true]));

        $this->set(compact('observacionesGenerales'));
    }

    /**
     * View method
     *
     * @param string|null $id Observaciones Generale id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $observacionesGeneral = $this->ObservacionesGenerales->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('observacionesGeneral', $observacionesGeneral);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $user = $this->Auth->user();
        $observacionesGenerale = $this->ObservacionesGenerales->newEntity();
        
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $observacionesGenerale = $this->ObservacionesGenerales->patchEntity($observacionesGenerale, $data);
            $observacionesGenerale->id_user = $user['id'];
            $observacionesGenerale->id_centro = $user['id_centro'];
            $observacionesGenerale->id_turno = $user['id_turno'];
            $observacionesGenerale->status = true;

            //debug($observacionesGenerale);
            //exit;
            
            if ($this->ObservacionesGenerales->save($observacionesGenerale)) {
                $this->Flash->success(__('The observaciones generale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The observaciones generale could not be saved. Please, try again.'));
        }
        $this->set(compact('observacionesGenerale'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Observaciones Generale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $observacionesGenerale = $this->ObservacionesGenerales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $observacionesGenerale = $this->ObservacionesGenerales->patchEntity($observacionesGenerale, $this->request->getData());
            if ($this->ObservacionesGenerales->save($observacionesGenerale)) {
                $this->Flash->success(__('The observaciones ha sido generada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The observaciones generale could not be saved. Please, try again.'));
        }
        $this->set(compact('observacionesGeneral'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Observaciones Generale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $observacionesGeneral = $this->ObservacionesGenerales->get($id);
        $observacionesGeneral->status = false;
        if ($this->ObservacionesGenerales->save($observacionesGeneral)) {
            $this->Flash->success(__('The observacion ha sido cancelada.'));
        } else {
            $this->Flash->error(__('The observaciones generale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
