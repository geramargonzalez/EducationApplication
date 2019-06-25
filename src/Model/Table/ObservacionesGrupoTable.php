<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ObservacionesGrupo Model
 *
 * @method \App\Model\Entity\ObservacionesGrupo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ObservacionesGrupo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ObservacionesGrupo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ObservacionesGrupo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObservacionesGrupo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ObservacionesGrupo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ObservacionesGrupo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ObservacionesGrupo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ObservacionesGrupoTable extends Table
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

        $this->setTable('observaciones_grupo');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

         $this->belongsTo('Grupo', [
            'foreignKey' => 'id_grupo',
            'joinType' => 'INNER'
        ]);

         $this->belongsTo('Users', [
            'foreignKey' => 'id_user',
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
            ->integer('id_grupo')
            ->requirePresence('id_grupo', 'create')
            ->allowEmptyString('id_grupo', false);

        $validator
            ->integer('id_user')
            ->requirePresence('id_user', 'create')
            ->allowEmptyString('id_user', false);

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->allowEmptyString('descripcion', false);

        return $validator;
    }
}
