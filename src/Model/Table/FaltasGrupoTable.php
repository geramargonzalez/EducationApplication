<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FaltasGrupo Model
 *
 * @method \App\Model\Entity\FaltasGrupo get($primaryKey, $options = [])
 * @method \App\Model\Entity\FaltasGrupo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FaltasGrupo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FaltasGrupo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FaltasGrupo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FaltasGrupo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FaltasGrupo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FaltasGrupo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FaltasGrupoTable extends Table
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

        $this->setTable('faltas_grupo');
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
            ->integer('id_grupo')
            ->requirePresence('id_grupo', 'create')
            ->allowEmptyString('id_grupo', false);

        $validator
            ->integer('faltas')
            ->requirePresence('faltas', 'create')
            ->allowEmptyString('faltas', false);

        $validator
            ->integer('cant_horas')
            ->requirePresence('cant_horas', 'create')
            ->allowEmptyString('cant_horas', false);

        return $validator;
    }
}
