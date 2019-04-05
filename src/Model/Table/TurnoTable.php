<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Turno Model
 *
 * @method \App\Model\Entity\Turno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Turno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Turno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Turno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Turno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Turno findOrCreate($search, callable $callback = null, $options = [])
 */
class TurnoTable extends Table
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

        $this->setTable('turno');
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
            ->scalar('nombre')
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->allowEmptyString('nombre', false);

        $validator
            ->integer('id_centro')
            ->requirePresence('id_centro', 'create')
            ->allowEmptyString('id_centro', false);

        return $validator;
    }
}
