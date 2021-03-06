<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Derivaciones Model
 *
 * @method \App\Model\Entity\Derivacione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Derivacione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Derivacione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Derivacione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Derivacione|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Derivacione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Derivacione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Derivacione findOrCreate($search, callable $callback = null, $options = [])
 */
class DerivacionesTable extends Table
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

        $this->setTable('derivaciones');
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
            ->scalar('descripcion')
            ->maxLength('descripcion', 255)
            ->requirePresence('descripcion', 'create')
            ->allowEmptyString('descripcion', false);

        return $validator;
    }
}
