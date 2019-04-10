<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RendimientoAlumno Model
 *
 * @method \App\Model\Entity\RendimientoAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\RendimientoAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RendimientoAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RendimientoAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RendimientoAlumno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RendimientoAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RendimientoAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RendimientoAlumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RendimientoAlumnoTable extends Table
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
            ->scalar('tipoevaluacion')
            ->maxLength('tipoevaluacion', 255)
            ->requirePresence('tipoevaluacion', 'create')
            ->allowEmptyString('tipoevaluacion', false);

        $validator
            ->integer('rendimiento')
            ->requirePresence('rendimiento', 'create')
            ->allowEmptyString('rendimiento', false);

        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_user', false);

        return $validator;
    }
}
