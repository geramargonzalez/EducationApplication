<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersTurno Model
 *
 * @method \App\Model\Entity\UsersTurno get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersTurno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersTurno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersTurno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersTurno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersTurno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersTurno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersTurno findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTurnoTable extends Table
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

        $this->setTable('users_turno');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id_turno')
            ->requirePresence('id_turno', 'create')
            ->allowEmptyString('id_turno', false);

        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_user', false);

        return $validator;
    }
}
