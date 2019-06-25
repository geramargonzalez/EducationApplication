<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
 
/**
 * GrupoAlumnos Model
 *
 * @method \App\Model\Entity\GrupoAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrupoAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrupoAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrupoAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrupoAlumno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrupoAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrupoAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrupoAlumno findOrCreate($search, callable $callback = null, $options = [])
 */
class GrupoAlumnosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setTable('grupo_alumnos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Alumnos', [
            'foreignKey' => 'id_alumno',
            'joinType' => 'INNER'
        ]);

         $this->belongsTo('Grupo', [
            'foreignKey' => 'id_grupo',
            'joinType' => 'INNER'
        ]);

        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->integer('id_grupo')
            ->requirePresence('id_grupo', 'create')
            ->allowEmptyString('id_grupo', false);

        $validator
            ->integer('id_alumno')
            ->requirePresence('id_alumno', 'create')
            ->allowEmptyString('id_alumno', false);

        return $validator;
    }
}
