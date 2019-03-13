<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TallerAlumnos Model
 *
 * @method \App\Model\Entity\TallerAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\TallerAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TallerAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TallerAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TallerAlumno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TallerAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TallerAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TallerAlumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TallerAlumnosTable extends Table
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

        $this->setTable('taller_alumnos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->integer('id_taller')
            ->requirePresence('id_taller', 'create')
            ->allowEmptyString('id_taller', false);

        $validator
            ->integer('id_alumno')
            ->requirePresence('id_alumno', 'create')
            ->allowEmptyString('id_alumno', false);

        return $validator;
    }
}
