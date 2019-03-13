<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TallerAlumno Entity
 *
 * @property int $id
 * @property int $id_taller
 * @property int $id_alumno
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class TallerAlumno extends Entity
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
        'id_taller' => true,
        'id_alumno' => true,
        'created' => true,
        'modified' => true,
        'id_user' => true
    ];
}
