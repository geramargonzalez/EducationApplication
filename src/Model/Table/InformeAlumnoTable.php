<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InformeAlumno Model
 *
 * @method \App\Model\Entity\InformeAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\InformeAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InformeAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InformeAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InformeAlumno|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InformeAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InformeAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InformeAlumno findOrCreate($search, callable $callback = null, $options = [])
 */
class InformeAlumnoTable extends Table
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

        $this->setTable('informe_alumno');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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

        return $validator;
    }
}
