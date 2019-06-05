<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use App\Enums\RolesEnum;

/**
 * Alumnos Controller
 *
 * @property \App\Model\Table\AlumnosTable $Alumnos
 *
 * @method \App\Model\Entity\Alumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlumnosController extends AppController
{
      public function initialize()
    {
        parent::initialize();
        $this->loadModel('Taller');
        $this->loadModel('Turno');
        $this->loadModel('Centro');
        $this->loadModel('UsersCentro');
        $this->loadModel('GrupoAlumnos');
        $this->loadModel('Grupo');
        $this->loadComponent('FileUpload'); 
        $this->loadModel('FaltasAlumnos');
    }
    /**
     
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        
        $user = $this->Auth->user();

        $query = $this->Taller->findById_user($user['id']);
        $taller = $query->first();
    
        $subquery = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);

        $subquery2 = $this->UsersCentro->find()
                                       ->select(['UsersCentro.id_turno'])
                                       ->where(['UsersCentro.id_user =' => $user['id']]);

        $query = $this->Alumnos->find()
                        ->where(['status =' => true])
                        ->andWhere([
                            'Alumnos.id_centro  IN' => $subquery])
                              ->andWhere([
                            'Alumnos.id_turno IN' => $subquery2]);

        $alumnos = $this->paginate($query,['limit' => 100]);      
        $this->set(compact('alumnos'));
    }

    /**
     * View method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user_session = $this->Auth->user();
        $alumno = $this->Alumnos->get($id);
        if($alumno->id_taller != 0){
            $taller  = $this->Taller->get($alumno->id_taller);
            $nombre = $taller->name;
        } else {
            $nombre = "No tiene taller asignado.";
        }
        $this->set(compact('alumno','nombre','user_session'));
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        $alumno = $this->Alumnos->newEntity();
        $ok = true;
        
        if ($this->request->is('post')) {
            
            $data = $this->request->getData();
            $alumno = $this->Alumnos->patchEntity($alumno,$data);
            $alumno->id_centro = $data['centros'];
            $alumno->id_turno = $data['turnos'];
            $alumno->status = true;

           if (!empty($data['image'])) {
                   $result = $this->FileUpload->fileUpload($data['image'], 'alumnos');
                   $alumno->image = $result['status'] == 200 ? ALUMNOS_IMG_PATH . DS . $result['file_name'] : 'avatar-1.jpg';
            } else {
               $alumno->image = "Null";
            }
            $faltaAlumnos = $this->FaltasAlumnos->newEntity();

            if($ok){
               
                if ($this->Alumnos->save($alumno)) {
                    $ok = false;   
                    $this->Flash->success(__('El alumno ' . $alumno->name . " " . $alumno->surname . " pudo ser guardado."));
                    return $this->redirect(['action' => 'index']);
               
                } else {
                    
                    $this->Flash->error(__('El alumno. Porfavor, intenta de nuevo.'));
                  }
                  
            }  
        }
        $turnos = $this->Turno->find('list', ['keyField' => 'id','valueField' => 'nombre']);
        $centros = $this->Centro->find('list', ['keyField' => 'id','valueField' => 'name']);
        $this->set(compact('alumno','turnos','centros'));
    }

     public function alumnosToGrupo($id = null, $id_taller = null)
    {
        $user = $this->Auth->user();
        $grupo = $this->Grupo->get($id);
        $alum_reg = 0;

        if ($this->request->is('post')) {
           
            $data = $this->request->getData();
            
            foreach ($data as $key => $value) {
                
                if ($value == 1) {
                
                    $alumno = $this->Alumnos->get($key);
                    $alumnosGrupo = $this->GrupoAlumnos->newEntity();
                    $datos  =  array(
                         'id_grupo' => $grupo->id,
                         'id_alumno' => $alumno->id
                      );
                    $alumnosTaller = $this->GrupoAlumnos->patchEntity($alumnosGrupo,$datos);
                    if ($this->GrupoAlumnos->save($alumnosGrupo)) {
                       $alum_reg++; 
                    }    
                }
            }
            if($alum_reg > 0){
                
                 $this->Flash->success(__('Los alumnos han sido registrados.'));
                 return $this->redirect(['controller' =>'Taller', 'action' => 'view',$id_taller]);
            
            } else{
                 $this->Flash->error(__('Se produjo un error.'));
            }
        }
       /* $subquery = $this->GrupoAlumnos->find()->select(['GrupoAlumnos.id_alumno']);

        $query = $this->Alumnos->find()
                    ->where(['status =' => true, 'id_turno =' => $user['id_turno'],
                        'id_centro =' => $user['id_centro']])
                     ->andWhere([
                    'Alumnos.id NOT IN' => $subquery
                ]);*/

        $subquery = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);

        $subquery2 = $this->UsersCentro->find()
                                       ->select(['UsersCentro.id_turno'])
                                       ->where(['UsersCentro.id_user =' => $user['id']]);

        $query_grupo = $this->GrupoAlumnos->find()
                ->select(['GrupoAlumnos.id_alumno']);

        $query = $this->Alumnos->find()
                    ->where(['status =' => true])
                    ->andWhere([
                            'Alumnos.id_centro  IN' => $subquery])
                    ->andWhere([
                            'Alumnos.id_turno IN' => $subquery2])
                    ->andWhere([
                            'Alumnos.id_turno =' => $grupo->id_turno])
                     ->andWhere([
                            'Alumnos.id_centro =' => $grupo->id_centro])
                    ->andWhere([
                    'Alumnos.id NOT IN' => $query_grupo
                ]);
        $alumnos = $query->toList();
        $this->set(compact('alumnos','grupo'));
    }


     public function alumnosFromGrupo($id = null)
    {
        $user = $this->Auth->user();
        $grupo = $this->Grupo->get($id);
        $alum_reg = 0;
        
        if ($this->request->is('post')) {
           
            $data = $this->request->getData();
            
            foreach ($data as $key => $value) {
                
                if ($value == 1) {
                
                    $alumno = $this->Alumnos->get($key);
                    $alumnosGrupo = $this->GrupoAlumnos->newEntity();
                    $datos  =  array(
                         'id_grupo' => $grupo->id,
                         'id_alumno' => $alumno->id
                      );
                    $alumnosTaller = $this->GrupoAlumnos->patchEntity($alumnosGrupo,$datos);

                    if ($this->GrupoAlumnos->save($alumnosGrupo)) {
                       $alum_reg++; 
                    }    
                }
            }
            if($alum_reg > 0){
                 $this->Flash->success(__('Los alumnos han sido registrados.'));
                 return $this->redirect(['controller' =>'Grupo', 'action' => 'view',$id]);
            } else{
                 $this->Flash->error(__('Se produjo un error.'));
            }
        }

        $subquery = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);

        $subquery2 = $this->UsersCentro->find()
                                       ->select(['UsersCentro.id_turno'])
                                       ->where(['UsersCentro.id_user =' => $user['id']]);

        $query_grupo = $this->GrupoAlumnos->find()
                ->select(['GrupoAlumnos.id_alumno']);

        $query = $this->Alumnos->find()
                    ->where(['status =' => true])
                    ->andWhere([
                            'Alumnos.id_centro  IN' => $subquery])
                    ->andWhere([
                            'Alumnos.id_turno IN' => $subquery2])
                    ->andWhere([
                            'Alumnos.id_turno =' => $grupo->id_turno])
                     ->andWhere([
                            'Alumnos.id_centro =' => $grupo->id_centro])
                    ->andWhere([
                    'Alumnos.id NOT IN' => $query_grupo
                ]);
                     
        $alumnos = $query->toList();
        $this->set(compact('alumnos','grupo'));
    }



    public function alumnoToGrupo(){

        $user = $this->Auth->user();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
           
            $data = $this->request->getData();
            
            $grupo = $this->Grupo->get($data['grupos']);
            $alumno = $this->Alumnos->get($data['alumnos']);

            if($alumno->id_centro == $grupo->id_centro && $alumno->id_turno == $grupo->id_turno){

                $alumnosGrupo = $this->GrupoAlumnos->newEntity();
                $datos  =  array(
                    'id_alumno' => $alumno->id,
                    'id_grupo' => $grupo->id 
                  );
                
                $alumnosGrupo = $this->GrupoAlumnos->patchEntity($alumnosGrupo,$datos);
                
                if ($this->GrupoAlumnos->save($alumnosGrupo)) {
                     $this->Flash->success(__('El alumno se a ingresado en la materia.'));
                     return $this->redirect(['action' => 'index']);
                }    
                $this->Flash->error(__('Se produjo un error. Verifique sus datos.'));

            } else {

                 $this->Flash->error(__('Ese grupo no pertenece al mismo centro y turno de ese alumno.'));

            }

            
        }

        $grupos = $this->Grupo->find('list')->where(['id_turno' => $user['id_turno'], 'id_centro' => $user['id_centro']]);
       
       
        $subquery = $this->UsersCentro->find()
                ->select(['UsersCentro.id_centro'])
                ->where(['UsersCentro.id_user =' => $user['id']]);

        $subquery2 = $this->UsersCentro->find()
                                       ->select(['UsersCentro.id_turno'])
                                       ->where(['UsersCentro.id_user =' => $user['id']]);


        $grupos = $this->Grupo->find('list')->where(['Grupo.id_turno IN' =>  $subquery2])
                                            ->andWhere(['Grupo.id_centro IN' => $subquery]);                            

        $query_grupo = $this->GrupoAlumnos->find()
                ->select(['GrupoAlumnos.id_alumno']);

        $alumnos = $this->Alumnos->find('list',['keyField' => 'id',
                                               'valueField' => 'full_name'])
                    ->where(['status =' => true])
                    ->andWhere([
                            'Alumnos.id_centro  IN' => $subquery])
                              ->andWhere([
                            'Alumnos.id_turno IN' => $subquery2])
                    ->andWhere([
                    'Alumnos.id NOT IN' => $query_grupo
                ]);
       
        $this->set(compact('alumnos','grupos'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $alumno = $this->Alumnos->get($id);
        $img = $alumno->image;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
             
            $data = $this->request->getData();
            $alumno = $this->Alumnos->patchEntity($alumno, $data);
            $alumno->id_centro = $data['centros'];
            $alumno->id_turno = $data['turnos'];

             if (!empty($data['image'])) {
                   $result = $this->FileUpload->fileUpload($data['image'], 'alumnos');
                   $alumno->image = $result['status'] == 200 ? ALUMNOS_IMG_PATH . DS . $result['file_name'] : 'avatar-1.jpg';
            } else {
               $alumno->image = $img;
            }

            if ($this->Alumnos->save($alumno)) {
                $this->Flash->success(__('The alumno has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alumno could not be saved. Please, try again.'));
        }
        $turnos = $this->Turno->find('list', ['keyField' => 'id',
                                             'valueField' => 'nombre']);
        $centros = $this->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name']);
        $this->set(compact('alumno','turnos','centros'));
    } 

    public function alumnosDesabilitados(){
        $alumnos = $this->paginate($this->Alumnos->find("all")->where(['status =' => false, 'id_turno =' => $user['id_turno'],'id_centro =' => $user['id_centro']]),['limit' => 100]);      
        $this->set(compact('alumnos'));
    }
    /**
     * Delete method
     *
     * @param string|null $id Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alumno = $this->Alumnos->get($id);
        $alumno->status = false;
        if ($this->Alumnos->save($alumno)) {
            $this->Flash->success(__('The alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

     public function deleteByAlumno($id = null, $id_grupo = null)
    {
        $alumno = $this->Alumnos->get($id);
        $query = $this->GrupoAlumnos->findById_grupoAndId_alumno($id_grupo,$id);
        $alumnoGrupo = $query->first();
        if ($this->GrupoAlumnos->delete($alumnoGrupo)) {
            $this->Flash->success(__('El alumno ha sido quitado del taller'));
        } else {
            $this->Flash->error(__('Se produjo un error, el alumno no puede ser quitado.'));
        }
        return $this->redirect(['controller'=>'Grupo', 'action' => 'view', $id_grupo]);
    }

}
