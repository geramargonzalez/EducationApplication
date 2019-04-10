<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alumnos Model
 *
 * @property \App\Model\Table\TallerTable|\Cake\ORM\Association\BelongsToMany $Taller
 *
 * @method \App\Model\Entity\Alumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Alumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Alumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Alumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alumno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Alumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Alumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Alumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlumnosTable extends Table
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
        $this->setTable('alumnos');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        
        $this->belongsTo('Taller', [
            'foreignKey' => 'id_taller',
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
            ->scalar('surname')
            ->maxLength('surname', 255)
            ->requirePresence('surname', 'create')
            ->allowEmptyString('surname', false);

        $validator
            ->integer('age')
            ->requirePresence('age', 'create')
            ->allowEmptyString('age', false);

          $validator
            ->integer('tel')
            ->requirePresence('tel', 'create')
            ->allowEmptyString('tel', false);

        $validator
            ->scalar('procedencia')
            ->maxLength('procedencia', 255)
            ->requirePresence('procedencia', 'create')
            ->allowEmptyString('procedencia', false);

        $validator
            ->scalar('observation')
            ->requirePresence('observation', 'create')
            ->allowEmptyString('observation', false);

        $validator
            ->scalar('ci')
            ->requirePresence('ci', 'create')
            ->allowEmptyString('ci', false);

        $validator
            ->integer('id_taller')
            ->requirePresence('id_taller', 'create');

          $validator
            ->integer('id_centro')
            ->allowEmptyString('id_centro', 'create');
        $validator
            ->integer('id_turno')
            ->allowEmptyString('id_turno', 'create');

        return $validator;
    }
}
