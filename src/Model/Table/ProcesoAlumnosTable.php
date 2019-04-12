<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProcesoAlumnos Model
 *
 * @method \App\Model\Entity\ProcesoAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProcesoAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProcesoAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProcesoAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProcesoAlumno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProcesoAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProcesoAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProcesoAlumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProcesoAlumnosTable extends Table
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

        $this->setTable('proceso_alumnos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Users', [
            'foreignKey' => 'id_user'
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

        /*$validator
            ->integer('conducta')
            ->requirePresence('conducta', 'create')
            ->allowEmptyString('conducta', true);


        $validator
            ->integer('rendimiento')
            ->requirePresence('rendimiento', 'create')
            ->allowEmptyString('rendimiento', true);

        $validator
            ->integer('expresion_oral')
            ->requirePresence('expresion_oral', 'create')
            ->allowEmptyString('expresion_oral', true);*/

        $validator
            ->integer('promedio')
            ->requirePresence('promedio', 'create')
            ->allowEmptyString('promedio', false);

        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_user', false);

        return $validator;
    }
}
