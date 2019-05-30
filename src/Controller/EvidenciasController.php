<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Evidencias Controller
 *
 * @property \App\Model\Table\EvidenciasTable $Evidencias
 *
 * @method \App\Model\Entity\Evidencia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EvidenciasController extends AppController
{

       public function initialize()
    {
        parent::initialize();
        $this->loadModel('InformePedagogico');
        $this->loadModel('EvidenciasResultado');
        
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $evidencias = $this->paginate($this->Evidencias);

        $this->set(compact('evidencias'));
    }

    /**
     * View method
     *
     * @param string|null $id Evidencia id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evidencia = $this->Evidencias->get($id, [
            'contain' => []
        ]);

        $this->set('evidencia', $evidencia);
    }
 
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id_informe = null)
    {
        $cantEvidencias = $this->getRequest()->getSession()->read('cantEvidencias');
  
        if($id_informe != null){
            $this->getRequest()->Session()->write('informe',$id_informe);
        } else {
            $id_informe =  $this->getRequest()->getSession()->read('informe');
        }
        $query = $this->InformePedagogico->find('all')->where(['InformePedagogico.id' => $id_informe]);
        $informe = $query->first();
        if($cantEvidencias < 1){
             $cantEvidencias =  $informe->cantEvidencias;
        }
       
        $evidencia = $this->Evidencias->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $evidencia = $this->Evidencias->patchEntity($evidencia, $data);
            $evidencia->id_informe = $id_informe;
            
            if ($this->Evidencias->save($evidencia)) {
                
                $cantEvidencias = $cantEvidencias - 1;
                $this->getRequest()->Session()->write('cantEvidencias',$cantEvidencias);

                foreach ($data['field_name'] as $key) {
                  $evidenciaResul = $this->EvidenciasResultado->newEntity();
                  
                  $datos = array (
                    'id_evidencia' => $evidencia->id,
                    'descripcion' => $key,
                    'status' => false
                  );
                  $evidenciaResul = $this->EvidenciasResultado->patchEntity($evidenciaResul, $datos);
                  $this->EvidenciasResultado->save($evidenciaResul);
                }  

                if( $cantEvidencias > 0){
                    return $this->redirect(['action' => 'add']);
                } else { 
                    $cantEvidencias = 0;
                    $this->getRequest()->Session()->write('cantEvidencias',$cantEvidencias);
                    $this->Flash->success(__('La evidencia se guardo correctamente.'));
                    return $this->redirect(['controller'=>'InformePedagogico','action' => 'view',$id_informe]);
                }

            }
            $this->Flash->error(__('The evidencia could not be saved. Please, try again.'));
        }
        $this->set(compact('evidencia','cantEvidencias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Evidencia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evidencia = $this->Evidencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evidencia = $this->Evidencias->patchEntity($evidencia, $this->request->getData());
            if ($this->Evidencias->save($evidencia)) {
                $this->Flash->success(__('The evidencia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The evidencia could not be saved. Please, try again.'));
        }
        $this->set(compact('evidencia'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Evidencia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evidencia = $this->Evidencias->get($id);
        if ($this->Evidencias->delete($evidencia)) {
            $this->Flash->success(__('The evidencia has been deleted.'));
        } else {
            $this->Flash->error(__('The evidencia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
