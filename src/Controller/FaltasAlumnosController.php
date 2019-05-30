<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;


/** 
 * FaltasAlumnos Controller
 *
 *
 * @method \App\Model\Entity\FaltasAlumno[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FaltasAlumnosController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Grupo');
        $this->loadModel('Centro');
        $this->loadModel('UsersCentro');
        $this->loadModel('GrupoAlumnos');
        $this->loadModel('Alumnos');
        $this->loadModel('FaltasGrupo');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user = $this->Auth->user();

        $faltas = array();

            $subquery = $this->UsersCentro->find()
                    ->select(['UsersCentro.id_centro'])
                    ->where(['UsersCentro.id_user =' => $user['id']]);

            $subquery2 = $this->UsersCentro->find()
                    ->select(['UsersCentro.id_turno'])
                    ->where(['UsersCentro.id_user =' => $user['id']]);
           
            $grupos = $this->Grupo->find('all',[
                            'contain' => ['Centro']
                        ])
                        ->Where([
                        'Grupo.status =' => true])
                        ->andWhere([
                        'Grupo.id_centro  IN' => $subquery])
                          ->andWhere([
                        'Grupo.id_turno IN' => $subquery2]);

            if ($this->request->is('post')) {

                $data = $this->request->getData();
                return $this->redirect(['action' => 'faltasAlumnos',$data['grupos']]);
                $grupo = $this->Grupo->get($data);
               
            }

            foreach ($grupos as $grupo) {
                $faltas[$grupo->id] = $grupo->name;
            }

     
        $this->set(compact('faltas'));
    }

    /**
     * View method 
     *
     * @param string|null $id Faltas Alumno id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id_alumno)
    {
        
        $alumno = $this->Alumnos->get($id_alumno);
        $id_user = $this->Auth->user('id');
        $totalHoras = $this->totalHoras($id_alumno);
        $totalFaltas = $this->totalFaltas($id_alumno);
        $this->set(compact('alumnos','totalFaltas','totalHoras'));
    
    } 

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faltasAlumno = $this->FaltasAlumnos->newEntity();
        if ($this->request->is('post')) {
            $faltasAlumno = $this->FaltasAlumnos->patchEntity($faltasAlumno, $this->request->getData());
            if ($this->FaltasAlumnos->save($faltasAlumno)) {
                $this->Flash->success(__('The faltas alumno has been saved.'));
 
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The faltas alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('faltasAlumno'));
    }

    public function faltasAlumnos($id_grupo)
    {
        $user = $this->Auth->user();
        $grupo = $this->Grupo->get($id_grupo);
        $time = Time::now();
        $mes = $time->month; 
        $day = $time->day;
        $alum_reg = 0;

        $alumnos = $this->alumnosPerGrupo($id_grupo);

        if ($this->request->is('post')) {
            
            $data = $this->request->getData();

            /*$faltasquery = $this->FaltasAlumnos->findByCreated($time);
            $faltasdeldia = $faltasquery->toList();*/

             $query = $this->GrupoAlumnos->find("all")
                        ->select(['GrupoAlumnos.id_alumno'])
                        ->where(['GrupoAlumnos.id_grupo =' => $id_grupo]);

            $falta_mismo_dia  = $this->FaltasAlumnos->find('all')->where(['MONTH(created) = ' => $mes])->andWhere(['DAY(created) = ' => $day])->andWhere(['FaltasAlumnos.id_alumno IN' => $query]);
            $falta_mismo_dia->enableHydration(false);
            $falta_mismo_dia = $falta_mismo_dia->toList(); 

             //debug($falta_mismo_dia);
             //exit;

            if(count($falta_mismo_dia) < 1){
                foreach ($data as $key => $value) {
                
                    $alumno = $this->Alumnos->get($key);
                    $alumnosFaltas = $this->FaltasAlumnos->newEntity();

                    $datos  =  array(
                        'id_alumno' => $alumno->id,
                         'id_user' => $user['id'],
                        "faltas" => $value > 0 ? 1 : 0,
                        'cant_horas' => $value
                  );
                    $alumnosFaltas = $this->FaltasAlumnos->patchEntity($alumnosFaltas,$datos);

                    if ($this->FaltasAlumnos->save($alumnosFaltas)) {
                       $alum_reg++; 
                    }    
                }
                if($alum_reg > 0){
                     $this->Flash->success(__('La lista fue pasada muchas gracias.'));
                     return $this->redirect(['action' => 'resumenDelDiaGrupo', $id_grupo]);
                } else{
                     $this->Flash->error(__('Se produjo un error.'));
                }
            } else {
                 $this->Flash->success(__('Ya pasaste la lista, muchas gracias.'));
            }       
                
        }
        $faltas = $this->totalFaltasGrupo($id_grupo);


        if($faltas != null){
           $this->Flash->success(__('Un usuario paso la lista en este grupo.'));
        }

         $falta_mismo_dia  = $this->FaltasGrupo->find('list')->where(['MONTH(created) = ' => $mes])->andWhere(['DAY(created) = ' => $day])->andWhere(['FaltasGrupo.id_grupo = ' => $id_grupo]);
        $falta_mismo_dia->enableHydration(false);
        $falta_mismo_dia = $falta_mismo_dia->toList(); 
        $grupoAsis = count($falta_mismo_dia);

        $this->set(compact('alumnos','grupo','grupoAsis'));
            
    }


    public function resumenDelDiaGrupo($id_grupo){
        
        $grupo = $this->Grupo->get($id_grupo);
        $time = Time::now();
        $mes = $time->month; 
        $day = $time->day;
        $alumnos = $this->alumnosPerGrupo($id_grupo);
        $alumnosFaltas = array();

    
        foreach ($alumnos as $alumno){
            
            $alumnosFaltas[] = $this->FaltasAlumnos->find("all")->where(['FaltasAlumnos.id_alumno' =>$alumno->id])->andWhere(['DATE(FaltasAlumnos.created) = ' => $time->format('y/m/d')])
                                                ->join([
                                                    'table' => 'alumnos',
                                                    'alias' => 'a',
                                                    'type' => 'right',
                                                    "conditions" => "a.id = " . $alumno->id
                                                 ])
                                                ->select([
                                                         'id'=> $alumno->id,
                                                         'name' => "a.name",
                                                         'surname' => "a.surname",
                                                         'faltas' => "SUM(FaltasAlumnos.faltas)",
                                                         'cant_horas' => "SUM(FaltasAlumnos.cant_horas)"
                                                    ]);
        } 

        $faltas = $this->totalFaltasGrupo($id_grupo);
        $horas = $this->totalCantHorasGrupo($id_grupo);

        $falta_mismo_dia  = $this->FaltasGrupo->find('list')->where(['MONTH(created) = ' => $mes])->andWhere(['DAY(created) = ' => $day])->andWhere(['FaltasGrupo.id_grupo = ' => $id_grupo]);
        $falta_mismo_dia->enableHydration(false);
        $falta_mismo_dia = $falta_mismo_dia->toList(); 

        if(count($falta_mismo_dia) < 1){
            
            $faltasGrupo = $this->FaltasGrupo->newEntity();
            $datos  =  array(
                'id_grupo' => $id_grupo,
                "faltas" => $faltas,
                'cant_horas' => $horas
            );
            $faltasGrupo = $this->FaltasGrupo->patchEntity($faltasGrupo,$datos);

          $this->FaltasGrupo->save($faltasGrupo); 
        }

         $falta_mismo_dia  = $this->FaltasGrupo->find('list')->where(['MONTH(created) = ' => $mes])->andWhere(['DAY(created) = ' => $day])->andWhere(['FaltasGrupo.id_grupo = ' => $id_grupo]);
        $falta_mismo_dia->enableHydration(false);
        $falta_mismo_dia = $falta_mismo_dia->toList(); 


        $grupoAsis = count($falta_mismo_dia);
         
    
        $this->set(compact('grupo','alumnosFaltas','faltas','horas','grupoAsis')); 
    }

    public function statsGrupoAsistencias(){
          
    }

    /////////////// 44444 /////////////////
    
    public function faltasPorAlumno($id_alumno = null){

        $alumno = $this->Alumnos->get($id_alumno);
        $faltas = $this->FaltasAlumnos->findById_alumno($id_alumno)->order(['created' => 'DESC']);
        $totalFaltas = $this->totalFaltasAlumno($id_alumno);
        $totalHoras = $this->totalCantHorasAlumno($id_alumno);
        $this->set(compact('alumno','faltas','totalHoras','totalFaltas'));
    }


     public function statsAlumnosFaltasMes($id_alumno = null)
    {
           $alumno = $this->Alumnos->get($id_alumno);
           $query1 = $this->FaltasAlumnos->findById_alumno($id_alumno);
           $query2 = $this->FaltasAlumnos->findById_alumno($id_alumno);
            
        $faltas= $query1->select(['faltasMes' => $query1->func()->sum('faltas'), 'Mes' =>'MONTH(created)'])
                  ->where(['id_alumno'  => $alumno->id])
                  ->group('MONTH(created)')
                  ->order(['MONTH(created)' => 'ASC']);

         $horas = $query2->select(['horasMes' => $query2->func()->sum('cant_horas'), 'Mes' =>'MONTH(created)'])
                  ->where(['id_alumno'  => $alumno->id])
                  ->group('MONTH(created)')
                  ->order(['MONTH(created)' => 'ASC']);

        $faltas->enableHydration(false);
        $faltas = $faltas->toList(); 
        $horas->enableHydration(false);
        $horas = $horas->toList();

        $this->set(compact('alumno','faltas','horas'));
    }


    ////// NO CONFUNDIR ////////

        public function elegirCentro()
        {
            $user = $this->Auth->user();
            $subquery = $this->UsersCentro->find()
                    ->select(['UsersCentro.id_centro']);
            $centros = $this->Centro->find('list', ['keyField' => 'id',
                    'valueField' => 'name'])->Where([
                        'Centro.id  IN' => $subquery]);  
            if ($this->request->is('post')) {

                $data = $this->request->getData();
                return $this->redirect(['action' => 'estadisticasCentro',$data['centros']]);
                $centro = $this->Centro->get($data);
               
          }
 
     
        $this->set(compact('centros'));
    }


    public function estadisticasCentro($id_centro = null){

       $user = $this->Auth->user();
       $time = Time::now();
       $mes = $time->month; 
       $year = $time->year; 
      
        $alums = $this->Alumnos->find("all")
                        ->select(['Alumnos.id'])
                        ->andWhere(['Alumnos.id_centro =' => $id_centro]);
       $alumnoFaltasDia = array();     
       $cantHorasDia = array(); 
       
       $faltasTotalesDia = 0;    
       $horasTotalesDia = 0; 

        $alumnoFaltasMes = array();     
       $cantHorasMes = array(); 
       
       $faltasTotalesMes = 0;    
       $horasTotalesMes = 0; 

       $alumnoFaltasAnual = array();     
       $cantHorasAnual = array(); 
       
       $faltasTotalesAnual = 0;    
       $horasTotalesAnual = 0;    
        
        foreach ($alums as $alum){
            
            $alumnoFaltasDia[] = $this->FaltasAlumnos->find("all")->where(['FaltasAlumnos.id_alumno' => $alum->id])->andWhere(['DATE(FaltasAlumnos.created) = ' => $time->format('y/m/d')])->select(['faltasTotales' => 'SUM(FaltasAlumnos.faltas)']);
           
            $cantHorasDia[] = $this->FaltasAlumnos->find("all")->where(['FaltasAlumnos.id_alumno' => $alum->id])->andWhere(['DATE(FaltasAlumnos.created) = ' => $time->format('y/m/d')])->select(['horasTotales' => 'SUM(FaltasAlumnos.cant_horas)']);

             $alumnoFaltasMes[] = $this->FaltasAlumnos->find("all")->where(['FaltasAlumnos.id_alumno' => $alum->id])->andWhere(['MONTH(FaltasAlumnos.created) = ' =>  $mes])->select(['faltasTotales' => 'SUM(FaltasAlumnos.faltas)']);
           
            $cantHorasMes[] = $this->FaltasAlumnos->find("all")->where(['FaltasAlumnos.id_alumno' => $alum->id])->select(['horasTotales' => 'SUM(FaltasAlumnos.cant_horas)'])->andWhere(['MONTH(FaltasAlumnos.created) = ' =>  $mes]);

            $alumnoFaltasAnual[] = $this->FaltasAlumnos->find("all")->where(['FaltasAlumnos.id_alumno' => $alum->id])->andWhere(['YEAR(FaltasAlumnos.created) = ' =>  $year])->select(['faltasTotales' => 'SUM(FaltasAlumnos.faltas)']);
           
            $cantHorasAnual[] = $this->FaltasAlumnos->find("all")->where(['FaltasAlumnos.id_alumno' => $alum->id])->select(['horasTotales' => 'SUM(FaltasAlumnos.cant_horas)'])->andWhere(['YEAR(FaltasAlumnos.created) = ' =>  $year]);
        }

        foreach ($alumnoFaltasDia as  $alumnoFalta) {
                foreach ($alumnoFalta as  $falta) {
                 $faltasTotalesDia += $falta->faltasTotales;
            }           
        
        }  
        foreach ($cantHorasDia as  $cantHora) {
                foreach ($cantHora as  $horas) {
                 $horasTotalesDia += $horas->horasTotales;
            }           
        }  

        foreach ($alumnoFaltasMes as  $alumnoFalta) {
                foreach ($alumnoFalta as  $falta) {
                 $faltasTotalesMes += $falta->faltasTotales;
            }           
        
        }  
        foreach ($cantHorasMes as  $cantHora) {
                foreach ($cantHora as  $horas) {
                 $horasTotalesMes += $horas->horasTotales;
            }           
        } 
        foreach ($alumnoFaltasAnual as  $alumnoFalta) {
                foreach ($alumnoFalta as  $falta) {
                 $faltasTotalesAnual += $falta->faltasTotales;
            }           
        
        }  
        foreach ($cantHorasAnual as  $cantHora) {
                foreach ($cantHora as  $horas) {
                 $horasTotalesAnual += $horas->horasTotales;
            }           
        }   

        $this->set(compact('faltasTotalesDia','horasTotalesDia','faltasTotalesMes','horasTotalesMes','faltasTotalesAnual','horasTotalesAnual','mes','time'));



    }

    /**
     * Edit method
     *
     * @param string|null $id Faltas Alumno id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id_alumno = null)
    {
        $time = Time::now();
        $mes = $time->month; 
        $day = $time->day;

       $query = $this->GrupoAlumnos->find("all")
                        ->select(['GrupoAlumnos.id_grupo'])
                        ->where(['GrupoAlumnos.id_alumno =' => $id_alumno]);
        $id_grupo = $query->first()->id_grupo;

        $faltasAlumno = $this->FaltasAlumnos->find('all')->where(['DATE(FaltasAlumnos.created) = ' => $time->format('y/m/d')])->andWhere(['FaltasAlumnos.id_alumno = ' => $id_alumno]);
        $faltasAlumno = $faltasAlumno->first(); 

        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();
            $faltasAlumno = $this->FaltasAlumnos->patchEntity($faltasAlumno, $data);
             
            $faltasAlumno->faltas = $data['cant_horas'] > 0 ? 1 : 0;
            $faltasAlumno->cant_horas = $data['cant_horas'];
            
            if ($this->FaltasAlumnos->save($faltasAlumno)) {

              $falta_mismo_dia  = $this->FaltasGrupo->find('all')->where(['MONTH(created) = ' => $mes])->andWhere(['DAY(created) = ' => $day])->andWhere(['FaltasGrupo.id_grupo = ' => $id_grupo]);
            
             
              $falta_mismo_dia = $falta_mismo_dia->first(); 
              $faltas = $this->totalFaltasGrupo($id_grupo);
              $horas = $this->totalCantHorasGrupo($id_grupo);
                  
             // $faltasGrupo = $this->FaltasGrupo->newEntity();
              $datos  =  array(
                  'id_grupo' => $id_grupo,
                  "faltas" => $faltas,
                  'cant_horas' => $horas 
              );
              $falta_mismo_dia = $this->FaltasGrupo->patchEntity($falta_mismo_dia,$datos);

                $this->FaltasGrupo->save($falta_mismo_dia); 
   
                $this->Flash->success(__('Se modifico la falta del estudiante'));
                return $this->redirect(['action' => 'resumenDelDiaGrupo',   $id_grupo]);
            }
            $this->Flash->error(__('The faltas alumno could not be saved. Please, try again.'));
        }
        $this->set(compact('faltasAlumno'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Faltas Alumno id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faltasAlumno = $this->FaltasAlumnos->get($id);
        if ($this->FaltasAlumnos->delete($faltasAlumno)) {
            $this->Flash->success(__('The faltas alumno has been deleted.'));
        } else {
            $this->Flash->error(__('The faltas alumno could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    function alumnosPerGrupo($id_grupo = null){
    
        $alumnos = array();
        $time = Time::now();
        $mes = $time->month; 
        $day = $time->day;

        $alums = $this->GrupoAlumnos->find("all")
                        ->select(['GrupoAlumnos.id_alumno'])
                        ->where(['GrupoAlumnos.id_grupo =' => $id_grupo]);

        foreach ($alums as $alum){
             $alumnos[] = $this->Alumnos->get($alum->id_alumno);
         }


       return $alumnos;
    }

    public function totalFaltas($id = null){
        $query = $this->FaltasAlumnos->findById_alumno($id);
        $faltas = $query->select(['totalFaltas' => $query->func()->sum('faltas')])->first();
        return $faltas->totalFaltas;
    }
    public function totalHoras($id = null){
        $query = $this->ProcesoAlumnos->findById_alumno($id);
        $horas = $query->select(['totalHoras' => $query->func()->sum('cant_horas')])->first();
        return $horas->totalHoras;
    }

    public function totalFaltasGrupo($id_grupo = null){
    
        $alumnos = array();
        $time = Time::now();
        $mes = $time->month; 
        $day = $time->day;

        $query = $this->GrupoAlumnos->find("all")
                        ->select(['GrupoAlumnos.id_alumno'])
                        ->where(['GrupoAlumnos.id_grupo =' => $id_grupo]);

        $faltas = $this->FaltasAlumnos->find('all')->where(['DATE(FaltasAlumnos.created) = ' => $time->format('y/m/d')])->andWhere(['FaltasAlumnos.id_alumno IN' => $query])->select(['faltas' => $query->func()->sum('faltas')]);
        $total_faltas = $faltas->first()->faltas;

        return $total_faltas;
    }

       public function totalCantHorasGrupo($id_grupo = null){
    
        $alumnos = array();
    
        $time = Time::now();
        $mes = $time->month; 
        $day = $time->day;

        $query = $this->GrupoAlumnos->find("all")
                        ->select(['GrupoAlumnos.id_alumno'])
                        ->where(['GrupoAlumnos.id_grupo =' => $id_grupo]);

        $horas = $this->FaltasAlumnos->find('all')->where(['DATE(FaltasAlumnos.created) = ' => $time->format('y/m/d')])->andWhere(['FaltasAlumnos.id_alumno IN' => $query])->select(['cant_horas' => $query->func()->sum('cant_horas')]);
        
        $total_horas = $horas->first()->cant_horas;

        return $total_horas;
    }

     public function totalFaltasAlumno($id_alumno = null){
    
        $faltas = $this->FaltasAlumnos->find('all')->select(['faltas' => 'SUM(FaltasAlumnos.faltas)'])->where(['FaltasAlumnos.id_alumno =' => $id_alumno]);
        
        $total_faltas = $faltas->first()->faltas;

        return $total_faltas;
    }
      public function totalCantHorasAlumno($id_alumno = null){
  
        $total_horas = $this->FaltasAlumnos->find('all')->select(['cant_horas' => 'SUM(FaltasAlumnos.cant_horas)'])->where(['FaltasAlumnos.id_alumno =' => $id_alumno]);
        
        $total_horas = $total_horas->first()->cant_horas;

        return $total_horas;
    }
    //this->viewBuilder()->setlayout('template_defualt');  
    //$this->layout = 'empty';
}
