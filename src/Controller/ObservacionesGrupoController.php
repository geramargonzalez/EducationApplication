<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ObservacionesGrupo Controller
 *
 * @property \App\Model\Table\ObservacionesGrupoTable $ObservacionesGrupo
 *
 * @method \App\Model\Entity\ObservacionesGrupo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ObservacionesGrupoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id_grupo = null)
    {
        $observacionesGrupos = $this->ObservacionesGrupo
            ->find('all',['contain' => ['Users']])
            ->where([ 
                'ObservacionesGrupo.id_grupo' => $id_grupo
            ])->order(['ObservacionesGrupo.created' => 'DESC']);
        
        $grupo = $this->ObservacionesGrupo->Grupo->get($id_grupo);
        $this->set(compact('observacionesGrupos','grupo'));
    }

    /**
     * View method
     *
     * @param string|null $id Observaciones Grupo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null,$id_grupo = null)
    {
        $observacionesGrupo = $this->ObservacionesGrupo->get($id);
        $grupo = $this->ObservacionesGrupo->Grupo->get($id_grupo);
        $this->set(compact('observacionesGrupos','grupo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id_grupo = null)
    {
        $observacionesGrupo = $this->ObservacionesGrupo->newEntity();
        $grupo = $this->ObservacionesGrupo->Grupo->get($id_grupo);
        $id_user = $this->Auth->user('id');
        
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $observacionesGrupo = $this->ObservacionesGrupo->patchEntity($observacionesGrupo, $data);
            $observacionesGrupo->descripcion = $data['observaciones'];
            $observacionesGrupo->id_user = $id_user;
            $observacionesGrupo->id_grupo = $grupo->id;

            if ($this->ObservacionesGrupo->save($observacionesGrupo)) {
                $this->Flash->success(__('The observaciones grupo has been saved.'));

                return $this->redirect(['action' => 'index',$grupo->id,]);
            }
            $this->Flash->error(__('The observaciones grupo could not be saved. Please, try again.'));
        }
        $this->set(compact('observacionesGrupo','grupo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Observaciones Grupo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $observacionesGrupo = $this->ObservacionesGrupo->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $observacionesGrupo = $this->ObservacionesGrupo->patchEntity($observacionesGrupo, $this->request->getData());
            if ($this->ObservacionesGrupo->save($observacionesGrupo)) {
                $this->Flash->success(__('The observaciones grupo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The observaciones grupo could not be saved. Please, try again.'));
        }
        $this->set(compact('observacionesGrupo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Observaciones Grupo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $observacionesGrupo = $this->ObservacionesGrupo->get($id);
        if ($this->ObservacionesGrupo->delete($observacionesGrupo)) {
            $this->Flash->success(__('The observaciones grupo has been deleted.'));
        } else {
            $this->Flash->error(__('The observaciones grupo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
