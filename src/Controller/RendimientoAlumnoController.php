<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RendimientoAlumno Controller
 *
 * @property \App\Model\Table\RendimientoAlumnoTable $RendimientoAlumno
 *
 * @method \App\Model\Entity\RendimientoAlumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RendimientoAlumnoController extends AppController
{

   public function initialize()
    {
        parent::initialize();
        $this->loadModel('Alumnos');
         $this->loadModel('ProcesoAlumnos');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id_alumno = null)
    {
        $id_user = $this->Auth->user('id');

        $alumno = $this->Alumnos->get($id_alumno);
        $rendimientoAlumno = $this->RendimientoAlumno->find("all")->where(['id_alumno =' => $id_alumno,'id_user = ' => $id_user]);

        $query = $this->RendimientoAlumno->findById_alumno($id_alumno, $id_user);

        $tipoEva = $query->select(['rendimiento' => $query->func()->avg('rendimiento'), 'tipo_evaluacion' =>'tipoevaluacion'])
                  ->where(['id_alumno'  => $alumno->id])
                  ->group('tipoevaluacion')
                  ->order(['rendimiento' => 'DESC']);

        $tipoEva->enableHydration(false);
        $tipo_evaluacion = $tipoEva->toList(); 
        $tipoEva->enableHydration(false);
        $grafico_torta = $tipoEva->toList();

        $this->set(compact('tipo_evaluacion','alumno','grafico_torta'));
    }

    /**
     * View method
     *
     * @param string|null $id Rendimiento Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rendimientoAlumno = $this->RendimientoAlumno->get($id);
        $this->set('rendimientoAlumno', $rendimientoAlumno);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rendimientoAlumno = $this->RendimientoAlumno->newEntity();
        if ($this->request->is('post')) {
            $rendimientoAlumno = $this->RendimientoAlumno->patchEntity($rendimientoAlumno, $this->request->getData());
            if ($this->RendimientoAlumno->save($rendimientoAlumno)) {
                $this->Flash->success(__('The rendimiento alumno has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rendimiento alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('rendimientoAlumno'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rendimiento Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rendimientoAlumno = $this->RendimientoAlumno->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rendimientoAlumno = $this->RendimientoAlumno->patchEntity($rendimientoAlumno, $this->request->getData());
            if ($this->RendimientoAlumno->save($rendimientoAlumno)) {
                $this->Flash->success(__('The rendimiento alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rendimiento alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('rendimientoAlumno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rendimiento Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rendimientoAlumno = $this->RendimientoAlumno->get($id);
        if ($this->RendimientoAlumno->delete($rendimientoAlumno)) {
            $this->Flash->success(__('The rendimiento alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The rendimiento alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
