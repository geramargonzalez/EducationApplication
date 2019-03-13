<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProcesoAlumnos Controller
 *
 * @property \App\Model\Table\ProcesoAlumnosTable $ProcesoAlumnos
 *
 * @method \App\Model\Entity\ProcesoAlumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcesoAlumnosController extends AppController
{

   // private $avg_conducta;
    //private $avg_expresionOral;
    //private $avg_rendimiento;
    
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Alumnos');
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
         $qry = $this->ProcesoAlumnos
            ->find('all')
            ->where([
                'ProcesoAlumnos.id_alumno' => $id,
            ]);
        $avg_rendimiento = $this->procesoAvgRendimiento($id);
        $avg_expresionOral = $this->procesoAvgExpresionOral($id);
        $avg_conducta = $this->procesoAvgConducta($id);
        $avg_general = $this->procesoAvgGeneral($id);
        
        $procesoAlumnos = $this->paginate($qry, ['limit' => 10]);
        $alumno = $this->Alumnos->get($id);
        $this->set(compact('procesoAlumnos','avg_conducta','avg_expresionOral','avg_rendimiento','avg_general','alumno'));
    }

    /**
     * View method
     *
     * @param string|null $id Proceso Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $procesoAlumno = $this->ProcesoAlumnos->get($id);
        $this->set('procesoAlumno', $procesoAlumno);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $procesoAlumno = $this->ProcesoAlumnos->newEntity();
       
        if ($this->request->is('post')) {

            $procesoAlumno = $this->ProcesoAlumnos->patchEntity($procesoAlumno, $this->request->getData());
            $procesoAlumno->promedio = ($procesoAlumno->conducta + $procesoAlumno->rendimiento + $procesoAlumno->expresion_oral);
             $procesoAlumno->id_alumno = $id;

            if ($this->ProcesoAlumnos->save($procesoAlumno)) {
                $this->Flash->success(__('The proceso alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proceso alumno could not be saved. Please, try again.'));
        }

        //
        $alumno = $this->Alumnos->get($id);
        $this->set(compact('procesoAlumno','alumno'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Proceso Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $procesoAlumno = $this->ProcesoAlumnos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $procesoAlumno = $this->ProcesoAlumnos->patchEntity($procesoAlumno, $this->request->getData());
            if ($this->ProcesoAlumnos->save($procesoAlumno)) {
                $this->Flash->success(__('The proceso alumno has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The proceso alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('procesoAlumno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Proceso Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $procesoAlumno = $this->ProcesoAlumnos->get($id);
        if ($this->ProcesoAlumnos->delete($procesoAlumno)) {
            $this->Flash->success(__('The proceso alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The proceso alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
   
    public function procesoAvgRendimiento($id = null){

        $query = $this->ProcesoAlumnos->findById_alumno($id);
        $rendi = $query->select(['avg' => $query->func()->avg('rendimiento')])->first();
       return $rendi->avg;

    }
    public function procesoAvgExpresionOral($id = null){
        $query = $this->ProcesoAlumnos->findById_alumno($id);
        $exp_oral = $query->select(['avg' => $query->func()->avg('expresion_oral')])->first();
        return $exp_oral->avg;
    }
    public function procesoAvgConducta($id = null){

        $query = $this->ProcesoAlumnos->findById_alumno($id);
        $condu = $query->select(['avg' => $query->func()->avg('conducta')])->first();
        return $condu->avg;
    }
     public function procesoAvgGeneral($id = null){

        $query = $this->ProcesoAlumnos->findById_alumno($id);
        $condu = $query->select(['avg' => $query->func()->avg('promedio')])->first();

        return $condu->avg;
    }
}
