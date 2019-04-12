<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Alumno Entity
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int $age
 * @property string $procedencia
 * @property string $observation
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Taller[] $taller
 */
class Alumno extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'surname' => true,
        'age' => true,
        'procedencia' => true,
        'tel' => true,
        'observation' => true,
        'created' => true,
        'modified' => true,
        'ci' => true,
        'id_taller'=> true,
        'id_turno'=> true,
        'id_centro'=> true,
        'status' => true
    ];
}
