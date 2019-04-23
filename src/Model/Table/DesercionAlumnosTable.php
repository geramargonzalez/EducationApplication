<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DesercionAlumnos Model
 *
 * @method \App\Model\Entity\DesercionAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\DesercionAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DesercionAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DesercionAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DesercionAlumno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DesercionAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DesercionAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DesercionAlumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DesercionAlumnosTable extends Table
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

        $this->setTable('desercion_alumnos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Alumnos', [
            'foreignKey' => 'id_alumno',
            'joinType' => 'INNER'
        ]);
         $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
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
            ->integer('id_alumno')
            ->requirePresence('id_alumno', 'create')
            ->allowEmptyString('id_alumno', false);

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 255)
            ->requirePresence('descripcion', 'create')
            ->allowEmptyString('descripcion', false);

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

            $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_user', false);

        return $validator;
    }
}
