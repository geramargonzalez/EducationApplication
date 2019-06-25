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
 
      public function initialize()
    {
        parent::initialize();
        $this->loadModel('Turno');
        $this->loadModel('UsersCentro');
        $this->loadModel('Centro');
        
    } 


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $user = $this->Auth->user();

        $subquery = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);
                
        $subquery2 = $this->UsersCentro->find()
                        ->select(['UsersCentro.id_turno'])
                        ->where(['UsersCentro.id_user =' => $user['id']]);

        $qry = $this->ObservacionesGenerales->find('all',['contain' => ['Centro','Users']])->where(['status =' => true])->andWhere(['ObservacionesGenerales.id_centro IN'=> $subquery])
             ->andWhere(['ObservacionesGenerales.id_turno IN'=> $subquery2])->order(['ObservacionesGenerales.created' => 'DESC']);

        $observacionesGenerales = $this->paginate($qry, ['limit' => 200]);
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
        $observacionesGeneral = $this->ObservacionesGenerales->get($id,['contain' => ['Users']]);
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
        $observacionesGeneral = $this->ObservacionesGenerales->newEntity();
        
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $observacionesGeneral = $this->ObservacionesGenerales->patchEntity($observacionesGeneral, $data);
            $observacionesGeneral->id_user = $user['id'];
            $observacionesGeneral->id_centro = $data['centros'];
            $observacionesGeneral->id_turno = $data['turnos'];
            $observacionesGeneral->status = true;
            
            if ($this->ObservacionesGenerales->save($observacionesGeneral)) {
                $this->Flash->success(__('The observaciones generale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The observaciones generale could not be saved. Please, try again.'));
        }

        $subquery = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);
        
        $centros = $this->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name'])->where(['Centro.id IN'=> $subquery]);
        
        $turnos = $this->Turno->find('list', ['keyField' => 'id','valueField' => 'nombre']);
        $this->set(compact('observacionesGeneral','centros','turnos'));
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
        $observacionesGeneral = $this->ObservacionesGenerales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $observacionesGeneral = $this->ObservacionesGenerales->patchEntity($observacionesGeneral, $this->request->getData());
            if ($this->ObservacionesGenerales->save($observacionesGeneral)) {
                $this->Flash->success(__('The observaciones ha sido generada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The observaciones generale could not be saved. Please, try again.'));
        }

         $subquery = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);
        
        $centros = $this->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name'])->where(['Centro.id IN'=> $subquery]);
        
        $turnos = $this->Turno->find('list', ['keyField' => 'id','valueField' => 'nombre']);

        $this->set(compact('observacionesGeneral','centros','turnos'));
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
