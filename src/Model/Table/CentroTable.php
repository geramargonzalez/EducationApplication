<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Centro Model
 *
 * @method \App\Model\Entity\Centro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Centro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Centro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Centro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centro|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Centro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Centro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Centro findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CentroTable extends Table
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

        $this->setTable('centro');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->belongsTo('Subsistema', [
            'foreignKey' => 'id_subsistema',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 255)
            ->requirePresence('direccion', 'create')
            ->allowEmptyString('direccion', false);

        $validator
            ->scalar('tel')
            ->maxLength('tel', 255)
            ->requirePresence('tel', 'create')
            ->allowEmptyString('tel', false);

         $validator
            ->scalar('id_subsistema')
            ->maxLength('id_subsistema', 11)
            ->requirePresence('id_subsistema', 'create')
            ->allowEmptyString('id_subsistema', false);

        return $validator;
    }
}
