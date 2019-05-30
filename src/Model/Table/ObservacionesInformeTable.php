<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ObservacionesInforme Model
 *
 * @method \App\Model\Entity\ObservacionesInforme get($primaryKey, $options = [])
 * @method \App\Model\Entity\ObservacionesInforme newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ObservacionesInforme[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ObservacionesInforme|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObservacionesInforme|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObservacionesInforme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ObservacionesInforme[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ObservacionesInforme findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ObservacionesInformeTable extends Table
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
        $this->setTable('observaciones_informe');
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
            ->integer('id_informe')
            ->requirePresence('id_informe', 'create')
            ->allowEmptyString('id_informe', false);

        $validator
            ->integer('id_alumno')
            ->requirePresence('id_alumno', 'create')
            ->allowEmptyString('id_alumno', false);

         $validator
            ->scalar('titulo')
            ->requirePresence('titulo', 'create')
            ->allowEmptyString('titulo', false);

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->allowEmptyString('descripcion', false);

        return $validator;
    }
}
