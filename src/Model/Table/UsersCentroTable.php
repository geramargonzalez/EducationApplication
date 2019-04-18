<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersCentro Model
 *
 * @method \App\Model\Entity\UsersCentro get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersCentro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersCentro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersCentro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersCentro|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersCentro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersCentro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersCentro findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersCentroTable extends Table
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

        $this->setTable('users_centro');
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
            ->integer('id_centro')
            ->requirePresence('id_centro', 'create')
            ->allowEmptyString('id_centro', false);

        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_user', false);

        return $validator;
    }
}
