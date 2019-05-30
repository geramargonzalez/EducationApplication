<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EvidenciasResultado Model
 *
 * @method \App\Model\Entity\EvidenciasResultado get($primaryKey, $options = [])
 * @method \App\Model\Entity\EvidenciasResultado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EvidenciasResultado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EvidenciasResultado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EvidenciasResultado|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EvidenciasResultado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EvidenciasResultado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EvidenciasResultado findOrCreate($search, callable $callback = null, $options = [])
 */
class EvidenciasResultadoTable extends Table
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

        $this->setTable('evidencias_resultado');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Evidencias', [
            'foreignKey' => 'id_evidencia',
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
            ->integer('id_evidencia')
            ->requirePresence('id_evidencia', 'create')
            ->allowEmptyString('id_evidencia', false);

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 255)
            ->requirePresence('descripcion', 'create')
            ->allowEmptyString('descripcion', false);

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->allowEmptyString('status', false);

        return $validator;
    }
}
