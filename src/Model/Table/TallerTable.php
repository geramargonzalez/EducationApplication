<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/** 
 * Taller Model
 *
 * @property \App\Model\Table\AlumnosTable|\Cake\ORM\Association\BelongsToMany $Alumnos
 *
 * @method \App\Model\Entity\Taller get($primaryKey, $options = [])
 * @method \App\Model\Entity\Taller newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Taller[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Taller|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Taller|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Taller patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Taller[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Taller findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TallerTable extends Table
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
        $this->setTable('taller');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);
        $validator
            ->scalar('role_id')
            ->maxLength('role_id', 11)
            ->requirePresence('role_id', 'create')
            ->allowEmptyString('name', false);
         $validator
            ->integer('id_centro')
            ->allowEmptyString('id_centro', 'create');
        $validator
            ->integer('id_turno')
            ->allowEmptyString('id_turno', 'create');

        return $validator;
    }
}
