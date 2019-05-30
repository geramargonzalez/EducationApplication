<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Grupo Controller
 *
 * @property \App\Model\Table\GrupoTable $Grupo
 *
 * @method \App\Model\Entity\Grupo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GrupoController extends AppController
{
   
        public function initialize()
    {
        parent::initialize();
        $this->loadModel('Turno');
        $this->loadModel('Centro');
        $this->loadModel('Alumnos');
        $this->loadModel('UsersCentro');
        $this->loadModel('GrupoAlumnos');
        $this->loadModel('ProcesoAlumnos');
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
       
        $query = $this->Grupo->find('all',[
                        'contain' => ['Centro']
                    ])
                    ->Where([
                    'Grupo.status =' => true])
                    ->andWhere([
                    'Grupo.id_centro  IN' => $subquery])
                      ->andWhere([
                    'Grupo.id_turno IN' => $subquery2]);

        $grupos = $this->paginate($query,['limit' => 100]);

        $this->set(compact('grupos'));
    }
    /**
     * View method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
        public function view($id = null)
    {
        $user = $this->Auth->user();
        $alumnos = array();
        $cantidad = 0;

        $talleresGrupos = $this->GrupoAlumnos->find('all')->where(['id_grupo' => $id]);
        $grupo = $this->Grupo->get($id);
 
        foreach ($talleresGrupos as $alumnoGrupo) {
            $alumnos[] = $this->Alumnos->get($alumnoGrupo->id_alumno);
            $cantidad++;
        }

        $subquery = $this->UsersCentro->find()
                         ->select(['UsersCentro.id_centro'])
                         ->where(['UsersCentro.id_user =' => $user['id']]);

        $subquery2 = $this->UsersCentro->find()
                ->select(['UsersCentro.id_turno'])
                ->where(['UsersCentro.id_user =' => $user['id']]);

        $grupos = $this->Grupo->find('list', ['keyField' => 'id','valueField' => 'name'])
                      ->Where([
                      'Grupo.status =' => true])
                      ->andWhere([
                      'Grupo.id_centro IN' => $subquery])
                        ->andWhere([
                      'Grupo.id_turno IN' => $subquery2]);

        $this->set(compact('alumnos','cantidad','grupos','grupo'));
    }  
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $user = $this->Auth->user();
        $grupo = $this->Grupo->newEntity();
        
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $grupo = $this->Grupo->patchEntity($grupo, $data);
            $grupo->id_centro = $data['centros'];
            $grupo->id_turno = $data['turnos'];
            $grupo->status = true;
            if ($this->Grupo->save($grupo)) { 
                $this->Flash->success(__('The grupo has been saved.'));
                return $this->redirect(['controller'=>'Alumnos','action' => 'alumnosFromGrupo',$grupo->id]);
            }
                $this->Flash->error(__('The grupo could not be saved. Please, try again.'));
            }

        $turnos = $this->Turno->find('list', ['keyField' => 'id','valueField' => 'nombre']);
        $centros = $this->Centro->find('list', ['keyField' => 'id','valueField' => 'name']);
        
        $this->set(compact('grupo', 'turnos','centros'));
    }
    /** 
     * Edit method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $grupo = $this->Grupo->get($id);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $grupo = $this->Grupo->patchEntity($grupo, $this->request->getData());
            
            if ($this->Grupo->save($grupo)) {

                $this->Flash->success(__('The grupo has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grupo could not be saved. Please, try again.'));
        }
        
        $turnos = $this->Turno->find('list', ['keyField' => 'id',
                                             'valueField' => 'nombre']);
        $centros = $this->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name']);
        
        $this->set(compact('grupo','turnos','centros'));
    }


    public function estadisticasGrupo($id_grupo){

        $id_user = $this->Auth->user('id');
        $grupo = $this->Grupo->get($id_grupo);
        $alums = $this->GrupoAlumnos->find("all")
                        ->select(['GrupoAlumnos.id_alumno'])
                        ->where(['GrupoAlumnos.id_grupo =' => $id_grupo]);
        $alumnoPromedios = array();   

        foreach ($alums as $alum){
            
            $alumnoPromedios[] = $this->ProcesoAlumnos->find("all")->where(['ProcesoAlumnos.id_alumno' => $alum->id_alumno])
                                                ->join([
                                                    'table' => 'alumnos',
                                                    'alias' => 'a',
                                                    'type' => 'right',
                                                    "conditions" => "a.id = " . $alum->id_alumno
                                                 ])
                                                  ->select([
                                                         'name' => "a.name",
                                                         'surname' => "a.surname",
                                                         'prom_general' => "AVG(ProcesoAlumnos.promedio)"  
                                                    ]);
        }                         
        $this->set(compact('grupo','alumnoPromedios'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Grupo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       // $this->request->allowMethod(['post', 'delete']);
        $grupo = $this->Grupo->get($id);
        $grupo->status = false;

        $query = $this->GrupoAlumnos->findById_grupo($id);
       // $gruposA = $query->toList();

        if ($this->Grupo->save($grupo)) {
            foreach ($query as $ga) {
                $this->GrupoAlumnos->delete($ga);
            }
            $this->Flash->success(__('The grupo has been deleted.'));
        } else {
            $this->Flash->error(__('The grupo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
