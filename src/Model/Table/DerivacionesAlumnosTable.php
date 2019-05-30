<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DerivacionesAlumnos Model
 *
 * @method \App\Model\Entity\DerivacionesAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\DerivacionesAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DerivacionesAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DerivacionesAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DerivacionesAlumno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DerivacionesAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DerivacionesAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DerivacionesAlumno findOrCreate($search, callable $callback = null, $options = [])
 */
class DerivacionesAlumnosTable extends Table
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

        $this->setTable('derivaciones_alumnos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Alumnos', [
            'foreignKey' => 'id_alumno',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Derivaciones', [
            'foreignKey' => 'id_derivacion',
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
            ->integer('id_derivacion')
            ->requirePresence('id_derivacion', 'create')
            ->allowEmptyString('id_derivacion', false);

        $validator
            ->integer('id_alumno')
            ->requirePresence('id_alumno', 'create')
            ->allowEmptyString('id_alumno', false);

        return $validator;
    }
}
