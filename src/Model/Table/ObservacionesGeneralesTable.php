<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ObservacionesGenerales Model
 *
 * @method \App\Model\Entity\ObservacionesGenerale get($primaryKey, $options = [])
 * @method \App\Model\Entity\ObservacionesGenerale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ObservacionesGenerale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ObservacionesGenerale|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObservacionesGenerale|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObservacionesGenerale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ObservacionesGenerale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ObservacionesGenerale findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ObservacionesGeneralesTable extends Table
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

        $this->setTable('observaciones_generales');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

          $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
            'joinType' => 'INNER'
        ]);

        
        $this->belongsTo('Centro', [
            'foreignKey' => 'id_centro',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Turno', [
            'foreignKey' => 'id_turno',
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
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_user', false);

        $validator
            ->integer('id_centro')
            ->requirePresence('id_centro', 'create')
            ->allowEmptyString('id_centro', false);

        $validator
            ->integer('id_turno')
            ->requirePresence('id_turno', 'create')
            ->allowEmptyString('id_turno', false);

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        return $validator;
    }
}
