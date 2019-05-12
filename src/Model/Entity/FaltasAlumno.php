<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FaltasAlumno Entity
 *
 * @property int $id
 * @property int $id_alumno
 * @property int $faltas
 * @property int $cant_horas
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class FaltasAlumno extends Entity
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
        'id_alumno' => true,
        'faltas' => true,
        'cant_horas' => true,
        'id_user' => true,
        'created' => true,
        'modified' => true
    ];
}
