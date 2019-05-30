<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InformePedagogico Model
 *
 * @method \App\Model\Entity\InformePedagogico get($primaryKey, $options = [])
 * @method \App\Model\Entity\InformePedagogico newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InformePedagogico[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InformePedagogico|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InformePedagogico|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InformePedagogico patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InformePedagogico[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InformePedagogico findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InformePedagogicoTable extends Table
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

        $this->setTable('informe_pedagogico');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
          $this->belongsTo('Centro', [
            'foreignKey' => 'id_centro',
            'joinType' => 'INNER'
        ]);

          $this->belongsTo('Turno', [
            'foreignKey' => 'id_turno',
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
            ->scalar('titulo')
            ->maxLength('titulo', 255)
            ->requirePresence('titulo', 'create')
            ->allowEmptyString('titulo', false);

         $validator
            ->integer('id_centro')
            ->allowEmptyString('id_centro', 'create');
        
        $validator
            ->integer('id_turno')
            ->allowEmptyString('id_turno', 'create');

        $validator
            ->integer('status')
            ->allowEmptyString('status', 'create');

        return $validator;
    }
}
