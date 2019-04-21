<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AlumnosTaller Model
 *
 * @method \App\Model\Entity\AlumnosTaller get($primaryKey, $options = [])
 * @method \App\Model\Entity\AlumnosTaller newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AlumnosTaller[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlumnosTaller|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlumnosTaller|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlumnosTaller patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AlumnosTaller[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlumnosTaller findOrCreate($search, callable $callback = null, $options = [])
 */
class AlumnosTallerTable extends Table
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
 
        $this->setTable('alumnos_taller');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

         $this->belongsTo('Alumnos', [
            'foreignKey' => 'id_alumnos',
            'joinType' => 'INNER'
        ]);

          $this->belongsTo('Taller', [
            'foreignKey' => 'id_taller',
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
            ->integer('id_alumno')
            ->requirePresence('id_alumno', 'create')
            ->allowEmptyString('id_alumno', false);

        $validator
            ->integer('id_taller')
            ->requirePresence('id_taller', 'create')
            ->allowEmptyString('id_taller', false);

        return $validator;
    }
}
