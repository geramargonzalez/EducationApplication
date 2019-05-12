<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FaltasAlumnos Model
 *
 * @method \App\Model\Entity\FaltasAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\FaltasAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FaltasAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FaltasAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FaltasAlumno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FaltasAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FaltasAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FaltasAlumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FaltasAlumnosTable extends Table
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

        $this->setTable('faltas_alumnos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Alumnos', [
            'foreignKey' => 'id_alumno',
            'joinType' => 'INNER'
        ]);
         $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
            'joinType' => 'INNER'
        ]);
        $this->addBehavior('Timestamp');
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
            ->integer('id_alumno')
            ->requirePresence('id_alumno', 'create')
            ->allowEmptyString('id_alumno', false);
        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_alumno', false);

        $validator
            ->integer('faltas')
            ->requirePresence('faltas', 'create')
            ->allowEmptyString('faltas', false);

        $validator
            ->integer('cant_horas')
            ->requirePresence('cant_horas', 'create')
            ->allowEmptyString('cant_horas', false);

        return $validator;
    }

    
}
